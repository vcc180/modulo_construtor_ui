<?php

class ModuloCampoModel extends MainModel
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


            if (empty($this->form_data['modulo_campo_modulo_id'])) {
                TMessenger::Error("Preencha o campo Módulo!");
                return;
            }

            if (empty($this->form_data['modulo_campo_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['modulo_campo_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['modulo_campo_tipo'])) {
                TMessenger::Error("Preencha o campo Tipo!");
                return;
            }




            $fields = array(
                'modulo_campo_modulo_id',
                'modulo_campo_nome',
                'modulo_campo_title',
                'modulo_campo_tipo',
                'modulo_campo_fk',
                'modulo_campo_reference_table',
                'modulo_campo_reference_key',
                'modulo_campo_reference_option',
                'modulo_campo_required',
                'modulo_campo_is_search',
                'modulo_campo_status'
            );

            $values = array(
                $this->form_data['modulo_campo_modulo_id'],
                $this->form_data['modulo_campo_nome'],
                $this->form_data['modulo_campo_title'],
                $this->form_data['modulo_campo_tipo'],
                (isset($this->form_data['modulo_campo_fk']) && $this->form_data['modulo_campo_fk'] == true) ? 1 : 0,
                $this->form_data['modulo_campo_reference_table'],
                $this->form_data['modulo_campo_reference_key'],
                $this->form_data['modulo_campo_reference_option'],
                (isset($this->form_data['modulo_campo_required']) && $this->form_data['modulo_campo_required'] == true) ? 1 : 0,
                (isset($this->form_data['modulo_campo_is_search']) && $this->form_data['modulo_campo_is_search'] == true) ? 1 : 0,
                1
            );

            $this->db = new Database();
            $result = $this->db->select("tbmodulo_campo", "count(*) total", "WHERE modulo_campo_modulo_id='" . $this->form_data['modulo_campo_modulo_id'] . "' AND modulo_campo_nome='" . $this->form_data['modulo_campo_nome'] . "' AND modulo_campo_title='" . $this->form_data['modulo_campo_title'] . "' AND modulo_campo_tipo='" . $this->form_data['modulo_campo_tipo'] . "'");

            if ($result[0]["total"] <= 0) {
                $r = $this->db->insert('tbmodulo_campo', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['modulo_campo_title']} criado(a) com sucesso!!");
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


            if (empty($this->form_data['modulo_campo_modulo_id'])) {
                TMessenger::Error("Preencha o campo Módulo!");
                return;
            }

            if (empty($this->form_data['modulo_campo_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }

            if (empty($this->form_data['modulo_campo_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['modulo_campo_tipo'])) {
                TMessenger::Error("Preencha o campo Tipo!");
                return;
            }


            if (!isset($this->form_data['modulo_campo_fk'])) {
                $this->form_data['modulo_campo_fk'] = false;
            } else {
                $this->form_data['modulo_campo_fk'] = true;
            }

            if (!isset($this->form_data['modulo_campo_required'])) {
                $this->form_data['modulo_campo_required'] = false;
            } else {
                $this->form_data['modulo_campo_required'] = true;
            }

            if (!isset($this->form_data['modulo_campo_is_search'])) {
                $this->form_data['modulo_campo_is_search'] = false;
            } else {
                $this->form_data['modulo_campo_is_search'] = true;
            }

            if (!isset($this->form_data['modulo_campo_status'])) {
                $this->form_data['modulo_campo_status'] = false;
            } else {
                $this->form_data['modulo_campo_status'] = true;
            }


            $fields = "modulo_campo_modulo_id='" . $this->form_data["modulo_campo_modulo_id"] . "', " . "modulo_campo_nome='" . $this->form_data["modulo_campo_nome"] . "', " . "modulo_campo_title='" . $this->form_data["modulo_campo_title"] . "', " . "modulo_campo_tipo='" . $this->form_data["modulo_campo_tipo"] . "', " . "modulo_campo_fk='" . $this->form_data["modulo_campo_fk"] . "', " . "modulo_campo_reference_table='" . $this->form_data["modulo_campo_reference_table"] . "', " . "modulo_campo_reference_key='" . $this->form_data["modulo_campo_reference_key"] . "', " . "modulo_campo_reference_option='" . $this->form_data["modulo_campo_reference_option"] . "', " . "modulo_campo_required='" . $this->form_data["modulo_campo_required"] . "', " . "modulo_campo_is_search='" . $this->form_data["modulo_campo_is_search"] . "', " . "modulo_campo_status='" . $this->form_data["modulo_campo_status"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbmodulo_campo', $fields, 'modulo_campo_id=' . $_REQUEST['modulo_campo_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['modulo_campo_title']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete()
    {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbmodulo_campo', 'modulo_campo_id="' . $_REQUEST['modulo_campo_id'] . '"');

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
            $true = $db->update('tbmodulo_campo', 'modulo_campo_status= 1 - modulo_campo_status', 'modulo_campo_id=' . $_REQUEST['modulo_campo_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['modulo_campo_title'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['modulo_campo_title'] . "'.");
                return;
            }
        }
    }
}
