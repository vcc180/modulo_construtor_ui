<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MedicamentoModel
 *
 * @author PC01
 */
class UsuarioModel extends MainModel {

    /**
     * $form_data
     * Os dados do formulÃ¡rio de envio.
     * @access public
     */
    public $form_data;

    /**
     * $form_msg
     * As mensagens de feedback para o usuÃ¡rio.
     * @access public
     */
    public $form_msg;

    /**
     * $db
     * O objeto da nossa conexÃ£o PDO
     * @access public
     */
    public $db;

    /**
     * Construtor
     * Carrega  o DB.
     * @since 0.1
     * @access public
     */
    public function __construct($db = false) {
        $this->db = $db;
    }

    public function fromMsg() {
        if (is_array($this->form_msg)) {
            echo "<div class='{$this->form_msg[0]}'>{$this->form_msg[1]}</div>";
        }
    }

//end getMsg()

    public function getDataForm() {
        $this->form_data = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';
        $this->form_data = isset($_POST['data']) ? $_POST['data'] : '';
    }

    public function Gravar() {
        //print_r($_POST);
        if (isset($_POST['data'])) {
            if (empty($this->form_data['permissaso_user'])) {
                TMessenger::Error("Selecione o campo Permissão, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['nome_user'])) {
                TMessenger::Error("Preencha o campo Nome, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['email_user'])) {
                TMessenger::Error("Preencha o campo E-mail, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['password'])) {
                TMessenger::Error("Preencha o campo Senha, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['re_password'])) {
                TMessenger::Error("Preencha o campo Re-senha, campo obrigatório!");
                return;
            }
            if ($this->form_data['password'] != $this->form_data['re_password']) {
                TMessenger::Error("As senhas não conferem!");
                return;
            }


            $where = 'WHERE `user_email`="' . $this->form_data['email_user'] . '"';
            $db = new Database();
            $res = $db->select('tbuser', 'COUNT(user_id) as count', $where);

            if ($res[0]['count'] <= 0) {
                $professor =isset($this->form_data['professor']) ? $this->form_data['professor'] : 0;
                $QUERY = 'INSERT INTO tbuser (user_name,user_password,user_email,user_img,user_permissions,fk_user_id,fk_user_type_id,user_ativo) SELECT "' . $this->form_data['nome_user'] . '","' . md5($this->form_data['password']) . '","' . $this->form_data['email_user'] . '","users/default-user.png",user_type_permicoes,' . $professor . ',' . $this->form_data['permissaso_user'] . ',1 FROM tbuser_type where user_type_id=' . $this->form_data['permissaso_user'];
                
                $r = $this->db->exec_query($QUERY);
                if ($r) {
                    TMessenger::Confirm("Usuário " . $this->form_data['nome_user'] . ' criado com sucesso!!');
                } else {
                    TMessenger::Error("Não foi possível criar o usuário " . $this->form_data['nome_user'] . '!!');
                }
            } else {
                TMessenger::Error("Não foi possível gravar o usuário " . $this->form_data['nome_user'] . ', dados existente!!');
            }
        }
    }

//end Gravar

    public function update() {
        //print_r($_POST);
        if (isset($_POST['data'])) {
            if (empty($this->form_data['permissaso_user'])) {
                TMessenger::Error("Selecione o campo Permissão, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['nome_user'])) {
                TMessenger::Error("Preencha o campo Nome, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['email_user'])) {
                TMessenger::Error("Preencha o campo E-mail, campo obrigatório!");
                return;
            }

            $this->configuraPermissoes();


            $permissoes = serialize(array('any', 'MENU' => $this->form_data['MENU'], 'PERMISSOES' => $this->form_data['PERMISSOES']));
            $permissoes = str_replace('"', '\"', $permissoes);

            $this->db = new Database();
            $r = $this->db->update('tbuser', 'user_name="' . $this->form_data['nome_user'] .
                    '", user_email="' . $this->form_data['email_user'] .
                    '", fk_user_type_id="' . $this->form_data['permissaso_user'] .
                    '", user_permissions="' . $permissoes . '"', 'user_id="' . $_REQUEST['user_id'] . '"');
            if ($r) {
                TMessenger::Confirm("Usuário " . $this->form_data['nome_user'] . ' atualizada com sucesso!!');
            } else {
                TMessenger::Error('Não foi possível atualizar o usuário!!');
            }
        }
    }

    private function configuraPermissoes() {
        $M = $this->form_data['MENU'];
        $this->form_data['MENU'] = ARRAY();
        $this->form_data['MENU']['HOME'] = 'HOME';
        $this->form_data['PERMISSOES'][] = 'any';
        foreach ($M as $key => $value) {
            $this->form_data['MENU'][$key] = $value;
            foreach ($value as $k => $v) {
                $this->form_data['PERMISSOES'][] = $v;
            }
        }
        $this->form_data['MENU']['LOGOUT'] = 'LOGOUT';
    }

    public function update_password() {
        //print_r($_POST);
        if (isset($_POST['data'])) {
            if (empty($this->form_data['password'])) {
                TMessenger::Error("Preencha o campo Senha, campo obrigatório!");
                return;
            }
            if (empty($this->form_data['recuver_password'])) {
                TMessenger::Error("Preencha o campo Re-senha, campo obrigatório!");
                return;
            }
            if ($this->form_data['password'] != $this->form_data['recuver_password']) {
                TMessenger::Error("As senhas não conferem!");
                return;
            }

            $this->db = new Database();
            $r = $this->db->update('tbuser', 'user_password="' . md5($this->form_data['password']) . '"', 'user_id="' . $_REQUEST['user_id'] . '"');
            if ($r) {
                TMessenger::Confirm("Usuário " . $this->form_data['user_name'] . ' atualizada com sucesso!!');
            } else {
                TMessenger::Error('Não foi possível atualizar o usuário!!');
            }
        }
    }

    public function ativar_desativar() {
        //VERIFICA SE EXISTE ANO_LETIVO
        if (!isset($_REQUEST['active'])) {
            return;
        }
        $where = 'WHERE `user_id`="' . $_REQUEST['user_id'] . '"';
        $this->db = new Database();
        $res = $this->db->select('tbuser', 'user_name,user_ativo', $where);
        $res = $res[0];

        $ativo = false;
        $ativo_desc = '';
        if ($res['user_ativo'] == true) {
            $ativo = false;
            $ativo_desc = 'Desativar';
        } else {
            $ativo = true;
            $ativo_desc = 'Ativar';
        }
        $YES = setURL('usuario-sistema/?active=true&user_id=' . $_REQUEST['user_id']);
        $NO = setURL('usuario-sistema/');

        if ($_REQUEST['active'] == 'false') {
            TMessenger::Question('Deseja ' . $ativo_desc . ' o usuário ' . $res['user_name'] . '?', $YES, $NO);
            return;
        }

        //EXECUTA CASO ACTIVE FOR IGUAL A VERDADEIRO
        if (isset($_REQUEST['active']) && $_REQUEST['active'] == 'true') {
            $this->db = new Database();
            $r = $this->db->update('tbuser', 'user_ativo="' . $ativo . '"', 'user_id="' . $_REQUEST['user_id'] . '"');
            if ($r) {
                TMessenger::Confirm("Usuário " . $this->form_data['user_name'] . ' atualizada com sucesso!!');
            } else {
                TMessenger::Error('Não foi possível atualizar o usuário!!');
            }
        }
    }

}
