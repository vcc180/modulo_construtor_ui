<?php

class SubmenuModel extends MainModel
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


            if (empty($this->form_data['submenu_menu_id'])) {
                TMessenger::Error("Preencha o campo Menu!");
                return;
            }

            if (empty($this->form_data['submenu_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['submenu_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['submenu_link'])) {
                TMessenger::Error("Preencha o campo Link!");
                return;
            }




            $fields = array(
                'submenu_menu_id',
                'submenu_nome',
                'submenu_title',
                'submenu_link',
                'submenu_status'
            );

            $values = array(

                $this->form_data['submenu_menu_id'],
                $this->form_data['submenu_nome'],
                $this->form_data['submenu_title'],
                $this->form_data['submenu_link'],
                1
            );

            $this->db = new Database();
            $result = $this->db->select("tbsubmenu", "count(*) total", "WHERE submenu_menu_id='" . $this->form_data['submenu_menu_id'] . "' AND submenu_nome='" . $this->form_data['submenu_nome'] . "' AND submenu_title='" . $this->form_data['submenu_title'] . "' AND submenu_link='" . $this->form_data['submenu_link'] . "'");

            if ($result[0]["total"] <= 0) {
                $r = $this->db->insert('tbsubmenu', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['submenu_title']} criado(a) com sucesso!!");
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


            if (empty($this->form_data['submenu_menu_id'])) {
                TMessenger::Error("Preencha o campo Menu!");
                return;
            }

            if (empty($this->form_data['submenu_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['submenu_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['submenu_link'])) {
                TMessenger::Error("Preencha o campo Link!");
                return;
            }



            if (!isset($this->form_data['submenu_status'])) {
                $this->form_data['submenu_status'] = false;
            } else {
                $this->form_data['submenu_status'] = true;
            }


            $fields = "submenu_menu_id='" . $this->form_data["submenu_menu_id"] . "', " . "submenu_nome='" . $this->form_data["submenu_nome"] . "', " . "submenu_title='" . $this->form_data["submenu_title"] . "', " . "submenu_link='" . $this->form_data["submenu_link"] . "', " . "submenu_status='" . $this->form_data["submenu_status"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbsubmenu', $fields, 'submenu_id=' . $_REQUEST['submenu_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['submenu_title']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete()
    {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbsubmenu', 'submenu_id="' . $_REQUEST['submenu_id'] . '"');

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
            $true = $db->update('tbsubmenu', 'submenu_status= 1 - submenu_status', 'submenu_id=' . $_REQUEST['submenu_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['submenu_title'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['submenu_title'] . "'.");
                return;
            }
        }
    }
}