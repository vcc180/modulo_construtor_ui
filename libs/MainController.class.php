<?php

/**
 * MainController - Todos os controllers deverão estender essa classe
 *
 * @package TutsupMVC
 * @since 0.1
 */
class MainController extends UserLogin {

    /**
     * $db
     *
     * Nossa conexão com a base de dados. Manterá o objeto PDO
     *
     * @access public
     */
    public $db;

    /**
     * $phpass
     *
     * Classe phpass 
     *
     * @see http://www.openwall.com/phpass/
     * @access public
     */
    public $phpass;

    /**
     * $title
     *
     * Título das páginas 
     *
     * @access public
     */
    public $title;

    /**
     * $login_required
     *
     * Se a página precisa de login
     *
     * @access public
     */
    public $login_required = false;

    /**
     * $permission_required
     *
     * Permissão necessária
     *
     * @access public
     */
    public $permission_required = 'any';

    /**
     * $parametros
     *
     * @access public
     */
    public $parametros = array();

    /**
     * Construtor da classe
     *
     * Configura as propriedades e métodos da classe.
     *
     * @since 0.1
     * @access public
     */
    public function __construct($parametros = array()) {
        
        // Instancia do DB
        $this->db = new Database ();
        // Phpass
        $this->phpass = new PasswordHash(8, false);

        // Parâmetros
        $this->parametros = $parametros;

        // Verifica o login
        $this->check_userlogin();
    }

// __construct

    /**
     * Load model
     *
     * Carrega os modelos presentes na pasta /models/.
     *
     * @since 0.1
     * @access public
     */
    public function load_model($model_name = false) {

        // Um arquivo deverá ser enviado
        if (!$model_name)
            return;

        // Garante que o nome do modelo tenha letras minúsculas
        $model_name = strtolower($model_name);

        // Inclui o arquivo
        $model_path = PATH . '/models/' . $model_name . '.php';

        // Verifica se o arquivo existe
        if (file_exists($model_path)) {
            // Inclui o arquivo
            require_once $model_path;

            // Remove os caminhos do arquivo (se tiver algum)
            $model_name = explode('/', $model_name);

            // Pega só o nome final do caminho
            $model_name = end($model_name);

            // Remove caracteres inválidos do nome do arquivo
            $model_name = preg_replace('/[^a-zA-Z0-9]/is', '', $model_name);

            // Verifica se a classe existe
            if (class_exists($model_name)) {
                // Retorna um objeto da classe
                return new $model_name($this->db, $this);
            }
            return;
        } // load_model
    }

// load_model

    final public function permission_requery() {
        // Verifica se o usuÃ¡rio estÃ¡ logado
        if (!$this->logged_in) {

            // Se nÃ£o; garante o logout
            $this->logout();

            // Redireciona para a pÃ¡gina de login
            $this->goto_login();

            // Garante que o script nÃ£o vai passar daqui
            return;
        }

        // Verifica se o usuÃ¡rio tem a permissÃ£o para acessar essa pÃ¡gina
        if (!$this->check_permissions($this->permission_required, $this->userdata['user_permissions'])) {
            setRedirect('home');
//            header('location:' . HOME_URI);
            // Finaliza aqui
            return;
        }
    }

}

// class MainController
