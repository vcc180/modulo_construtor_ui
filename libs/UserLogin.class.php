<?php

class UserLogin {
    //put your code here

    /**
     * UsuÃ¡rio logado ou nÃ£o
     * Verdadeiro se ele estiver logado.
     * @public
     * @access public
     * @var bol
     */
    public $logged_in;

    /**
     * Dados do usuÃ¡rio
     * @public
     * @access public
     * @var array
     */
    public $userdata;

    /**
     * Mensagem de erro para o formulÃ¡rio de login
     * @public
     * @access public
     * @var string
     */
    public $login_error;

    /**
     * CHECK_USER_LOGIN
     * Verifica o login
     * Configura as propriedades $logged_in e $login_error. TambÃ©m
     * configura o array do usuÃ¡rio em $userdata
     */
    public function check_userlogin() {

        // Verifica se existe uma sessÃ£o com a chave userdata
        // Tem que ser um array e nÃ£o pode ser HTTP POST
        if (isset($_SESSION['USER_DATA']) && !empty($_SESSION['USER_DATA']) && is_array($_SESSION['USER_DATA']) && !isset($_POST['USER_DATA'])) {
            //Configura os dados do usuário
            $userdata = $_SESSION['USER_DATA'];
            //garante que não é HTTP POST
            $userdata['POST'] = false;
        }
        // Verifica se existe um $_POST com a chave userdata
        // Tem que ser um array
        if (isset($_POST['USER_DATA']) && !empty($_POST['USER_DATA']) && is_array($_POST['USER_DATA'])) {
            //configura os dados do usuário
            $userdata = $_POST['USER_DATA'];
            $userdata['user_password'] = md5($userdata['user_password']);

            //garante que é HTTP POST
            $userdata['POST'] = true;
        }//end if
        //verifica se existe algum dado de usuário para conferir
        
        if (!isset($userdata) || !is_array($userdata)) {
            //desconfigura qualquer sessão que possa existir sobre o usuário
            $this->logout();
            
            return;
        }//end if
        //passa os dados do post para uma variável
        if ($userdata['POST'] === true) {
            $post = true;
        } else {
            $post = false;
        }//end if
        //remove a chave post do array $userdata
        unset($userdata['POST']);

        //verifica se existe algo a conferir
        if (empty($userdata)) {
            $this->logged_in = false;
            $this->login_error = null;
            //desconfigura qualquer sessão que possa existir sobre o usuário
            $this->logout();

            return;
        }//end if
        //Extrai variaveis dos dados do usuário
        extract($userdata);

        //verifica se existe um usuario e senha
        if (!isset($user_email) || !isset($user_password)) {
            $this->logged_in = false;
            $this->login_error = 'Dados incorretos!';

            //desconfigura qualquer sessão que possa existir sobre o usuário
            $this->logout();

            return;
        }//end if
        //limpa query strings
        $user_email = mysqli_real_escape_string($this->db->con, $user_email);
        //verifica se existe o usuário na base de dados
        $query = $this->db->select('tbuser', '*', "WHERE user_email='{$user_email}' AND user_ativo=true LIMIT 1");

        //verificar o resultado da consulta
        if (count($query) <= 0) {
            $this->logged_in = false;
            $this->login_error = 'Usuário inexistente.';

            //desconfigura qualquer sessão que possa existir sobre o usuário
            $this->logout();

            return;
        }

        //obtém id do usuário
        $user_id = (int) $query[0]['user_id'];

        //verificar se o ID existe
        if (empty($user_id)) {
            $this->logged_in = false;
            $this->login_error = 'Usuário inexistente.';

            //desconfigura qualquer sessão que possa existir sobre o usuário
            $this->logout();

            return;
        }


        //confere se a senha enviada confere
        if ($this->phpass->CheckPassword($user_password, $query[0]['user_password'])) {
            //se for uma sessão, verifica se a sessão bate com a do banco de dados
            if (session_id() != $query[0]['user_session_id'] && !$post) {
                $this->logged_in = false;
                $this->login_error = 'Usuário inexistente.';

                //desconfigura qualquer sessão que possa existir sobre o usuário
                $this->logout();

                return;
            }

            //se for um post
            if ($post) {
                //recria o ID da sessão
                session_regenerate_id();
                $session_id = session_id();

                //envia os dados de usuário para a sessão
                $_SESSION['USER_DATA'] = $query[0];

                //atualiza a senha
                $_SESSION['USER_DATA']['user_password'] = $user_password;

                //Atualizar o ID da sessão
                $_SESSION['USER_DATA']['user_session_id'] = $session_id;

                //Atualizar o ID da sessao na base de dados
                $this->db->update('tbuser', "user_session_id='{$session_id}'", "user_id='{$user_id}'");
            }

            //obtém um array com as permissões de usuário
            $_SESSION['USER_DATA']['user_permissions'] = unserialize($query[0]['user_permissions']);

            //configura a propriedade dizenque que o usuário está logado
            $this->logged_in = true;

            //configura os dados do usuário $this->userdata
            $this->userdata = $_SESSION['USER_DATA'];

            //verifica se existe uma URL para redirecionar o usuário
            if (isset($_SESSION['GOTO_URL'])) {
                //passa a url para uma variavel
                if (!empty($_SESSION['GOTO_URL'])) {
                    $goto_url = urldecode($_SESSION['GOTO_URL']);
                } else {
                    $goto_url = urldecode(HOME_URI);
                }
                //remove a sessão com a url
                unset($_SESSION['GOTO_URL']);

                header('location:' . $goto_url);
            }

            return;
        } else {
            //o usuário não está logado
            $this->logged_in = false;
            $this->login_error = 'Password não confere.';

            //desconfigura qualquer sessão que possa existir sobre o usuário
            $this->logout();

            return;
        }
    }

    /*
     * LOGOUT
     * DESCONFIGURA TUDO DO USUÁRIO
     * @param bool $redirect se verdadeiro, redireciona para a página de login
     * @final
     */

    final protected function logout($redirect = false) {
        //remove all data form $_SESSION['USER_DATA']
        $_SESSION['USER_DATA'] = array();
        unset($_SESSION['USER_DATA']);
        session_destroy();
        //reninicia session ID
        //session_regenerate_id();

        if ($redirect === true) {
            //envia o usuário para pagina de login
            $this->goto_login();
        }
    }

    /*
     * GOTO_LOGIN
     * REDIRECIONA PARA A PAGINA DE LOGIN
     * @final
     */

    final protected function goto_login() {
        if (defined('HOME_URI')) {
            //configura a URL Login
            $login_uri = HOME_URI . 'login/';

            //a página que o usuario estava
            //$_SESSION['GOTO_URL'] = urlencode($login_uri);
            //$_SESSION['GOTO_URL'] = HOME_URI . '/home/';
            //redireciona
            echo '<script type="text/javascript">window.location.href="' . $login_uri . '"</script>';
            //header('location:' . $login_uri);
        }
        return;
    }

    /*
     * GOTO_PAGE
     * Redireciona para uma determinada página
     * @final
     */

    final protected function goto_page($page_uri = null) {

        if (isset($_GET['url']) && !empty($_GET['url']) && !$page_uri) {
            //configura a URL
            $page_uri = urlencode($_GET['url']);
        }

        if ($page_uri) {
            //redireciona
            header('location:' . $page_uri);
        }
        return;
    }

    /*
     * CHECK_PERMISSIONS
     * Verifica permissoes do usuário
     * @param string $required A permissão requirida
     * @param array $user_permissions As permissções do usuário
     * @final
     */

    final protected function check_permissions($required = 'any', $user_permissions = array('any')) {

        if (!is_array($user_permissions)) {
            return;
        }

        if (!in_array($required, $user_permissions['PERMISSOES'])) {
            //redireciona
            return false;
        } else {
            return true;
        }
    }

}
