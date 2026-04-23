<?php

class ProjetosModel extends MainModel
{

    public $form_data;
    public $form_msg;
    public $db;

    public function __construct($db = false)
    {
        $this->db = $db;
    }

    public function getDataForm()
    {
        $this->form_data = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';
    }
    private function currencyFormatSQL($valor)
    {
        $tmp = str_replace('.', '', $valor);
        $tmp = str_replace(',', '.', $tmp);
        return $tmp;
    }
    public function save()
    {

        if ($this->form_data != '') {


            if (empty($this->form_data['projeto_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['projeto_name'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['projeto_path'])) {
                TMessenger::Error("Preencha o campo Diretório raiz!");
                return;
            }

            if (empty($this->form_data['projeto_url'])) {
                TMessenger::Error("Preencha o campo URL!");
                return;
            }

            if (empty($this->form_data['projeto_db_hostname'])) {
                TMessenger::Error("Preencha o campo Hostname!");
                return;
            }

            if (empty($this->form_data['projeto_db_database'])) {
                TMessenger::Error("Preencha o campo Database!");
                return;
            }

            if (empty($this->form_data['projeto_user'])) {
                TMessenger::Error("Preencha o campo Usuário!");
                return;
            }

            $fields = array(
                'projeto_title',
                'projeto_name',
                'projeto_path',
                'projeto_url',
                'projeto_db_hostname',
                'projeto_db_database',
                'projeto_user',
                'projeto_password',
                'projeto_status'
            );

            $values = array(

                $this->form_data['projeto_title'],
                $this->form_data['projeto_name'],
                str_replace("\\", "\\\\", $this->form_data['projeto_path']),
                $this->form_data['projeto_url'],
                $this->form_data['projeto_db_hostname'],
                $this->form_data['projeto_db_database'],
                $this->form_data['projeto_user'],
                $this->form_data['projeto_password'],
                1
            );

            $this->db = new Database();
            $result = $this->db->select("tbprojeto", "count(*) total", "WHERE projeto_title='" . $this->form_data['projeto_title'] . "' AND projeto_name='" . $this->form_data['projeto_name'] . "' AND projeto_path='" . $this->form_data['projeto_path'] . "' AND projeto_url='" . $this->form_data['projeto_url'] . "' AND projeto_db_hostname='" . $this->form_data['projeto_db_hostname'] . "' AND projeto_db_database='" . $this->form_data['projeto_db_database'] . "' AND projeto_user='" . $this->form_data['projeto_user'] . "'");

            if ($result[0]["total"] <= 0) {
                $r = $this->db->insert('tbprojeto', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['projeto_title']} criado(a) com sucesso!!");
                } else {
                    TMessenger::Error('Erro ao criar item!!');
                }
            } else {
                TMessenger::Error('Erro ao criar item, dado existente!!');
            }

        }
    }

    public function update()
    {

        if ($this->form_data != '') {


            if (empty($this->form_data['projeto_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['projeto_name'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['projeto_path'])) {
                TMessenger::Error("Preencha o campo Diretório raiz!");
                return;
            }

            if (empty($this->form_data['projeto_url'])) {
                TMessenger::Error("Preencha o campo URL!");
                return;
            }

            if (empty($this->form_data['projeto_db_hostname'])) {
                TMessenger::Error("Preencha o campo Hostname!");
                return;
            }

            if (empty($this->form_data['projeto_db_database'])) {
                TMessenger::Error("Preencha o campo Database!");
                return;
            }

            if (empty($this->form_data['projeto_user'])) {
                TMessenger::Error("Preencha o campo Usuário!");
                return;
            }



            if (!isset($this->form_data['projeto_status'])) {
                $this->form_data['projeto_status'] = false;
            } else {
                $this->form_data['projeto_status'] = true;
            }


            $fields = "projeto_title='" . $this->form_data["projeto_title"] . "', " . "projeto_name='" . $this->form_data["projeto_name"] . "', " . "projeto_path='" . str_replace("\\", "\\\\", $this->form_data['projeto_path']) . "', " . "projeto_url='" . $this->form_data["projeto_url"] . "', " . "projeto_db_hostname='" . $this->form_data["projeto_db_hostname"] . "', " . "projeto_db_database='" . $this->form_data["projeto_db_database"] . "', " . "projeto_user='" . $this->form_data["projeto_user"] . "', " . "projeto_password='" . $this->form_data["projeto_password"] . "', " . "projeto_status='" . $this->form_data["projeto_status"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbprojeto', $fields, 'projeto_id=' . $_REQUEST['projeto_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['projeto_title']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete()
    {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbprojeto', 'projeto_id="' . $_REQUEST['projeto_id'] . '"');

            if ($r) {
                TMessenger::Confirm('Removido com sucesso!!');
                return;
            }

            TMessenger::Error('Erro ao remover!!');
        }
    }

    public function setEnable()
    {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "enable") {
            $db = new Database();

            //INSERE O DADO
            $true = $db->update('tbprojeto', 'projeto_status= 1 - projeto_status', 'projeto_id=' . $_REQUEST['projeto_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['projeto_title'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['projeto_title'] . "'.");
                return;
            }
        }
    }
}