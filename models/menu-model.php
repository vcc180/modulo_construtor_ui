<?php

class MenuModel extends MainModel
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


            if (empty($this->form_data['menu_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['menu_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['menu_submenu'])) {
                TMessenger::Error("Preencha o campo Submentu!");
                return;
            }

            if (empty($this->form_data['menu_icon'])) {
                TMessenger::Error("Preencha o campo Icone!");
                return;
            }

            $fields = array(
                'menu_title',
                'menu_nome',
                'menu_submenu',
                'menu_icon',
                'menu_status'
            );

            $values = array(

                $this->form_data['menu_title'],
                $this->form_data['menu_nome'],
                (isset($this->form_data['menu_submenu']) && $this->form_data['menu_submenu'] == true) ? 1 : 0,
                $this->form_data['menu_icon'],
                1
            );

            $this->db = new Database();
            $result = $this->db->select("tbmenu", "count(*) total", "WHERE menu_title='" . $this->form_data['menu_title'] . "' AND menu_nome='" . $this->form_data['menu_nome'] . "' AND menu_submenu='" . $this->form_data['menu_submenu'] . "' AND menu_icon='" . $this->form_data['menu_icon'] . "'");

            if ($result[0]["total"] <= 0) {
                $r = $this->db->insert('tbmenu', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['menu_title']} criado(a) com sucesso!!");
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


            if (empty($this->form_data['menu_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['menu_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['menu_submenu'])) {
                TMessenger::Error("Preencha o campo Submentu!");
                return;
            }

            if (empty($this->form_data['menu_icon'])) {
                TMessenger::Error("Preencha o campo Icone!");
                return;
            }



            if (!isset($this->form_data['menu_submenu'])) {
                $this->form_data['menu_submenu'] = false;
            } else {
                $this->form_data['menu_submenu'] = true;
            }

            if (!isset($this->form_data['menu_status'])) {
                $this->form_data['menu_status'] = false;
            } else {
                $this->form_data['menu_status'] = true;
            }


            $fields = "menu_title='" . $this->form_data["menu_title"] . "', " . "menu_nome='" . $this->form_data["menu_nome"] . "', " . "menu_submenu='" . $this->form_data["menu_submenu"] . "', " . "menu_icon='" . $this->form_data["menu_icon"] . "', " . "menu_status='" . $this->form_data["menu_status"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbmenu', $fields, 'menu_id=' . $_REQUEST['menu_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['menu_title']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete()
    {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbmenu', 'menu_id="' . $_REQUEST['menu_id'] . '"');

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
            $true = $db->update('tbmenu', 'menu_status= 1 - menu_status', 'menu_id=' . $_REQUEST['menu_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['menu_title'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['menu_title'] . "'.");
                return;
            }
        }
    }
}