<?php

class ModulosModel extends MainModel
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


            if (empty($this->form_data['modulos_projeto_id'])) {
                TMessenger::Error("Preencha o campo Projeto!");
                return;
            }

            if (empty($this->form_data['modulos_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['modulos_modulo'])) {
                TMessenger::Error("Preencha o campo Módulo!");
                return;
            }

            if (empty($this->form_data['modulos_controller'])) {
                TMessenger::Error("Preencha o campo Controller!");
                return;
            }

            if (empty($this->form_data['modulos_model'])) {
                TMessenger::Error("Preencha o campo Model!");
                return;
            }

            if (empty($this->form_data['modulos_table'])) {
                TMessenger::Error("Preencha o campo Tabela!");
                return;
            }

            if (empty($this->form_data['modulos_db_prefixo'])) {
                TMessenger::Error("Preencha o campo Prefixo!");
                return;
            }

            if (empty($this->form_data['modulos_primary_key'])) {
                TMessenger::Error("Preencha o campo Primary Key!");
                return;
            }

            $fields = array(
                'modulos_projeto_id',
                'modulos_title',
                'modulos_modulo',
                'modulos_controller',
                'modulos_model',
                'modulos_table',
                'modulos_db_prefixo',
                'modulos_primary_key',
                'modulos_field_default',
                'modulos_field_status'
            );

            $values = array(
                $this->form_data['modulos_projeto_id'],
                $this->form_data['modulos_title'],
                $this->form_data['modulos_modulo'],
                $this->form_data['modulos_controller'],
                $this->form_data['modulos_model'],
                $this->form_data['modulos_table'],
                $this->form_data['modulos_db_prefixo'],
                $this->form_data['modulos_primary_key'],
                $this->form_data['modulos_field_default'],
                1
            );

            $this->db = new Database();
            $result = $this->db->select("tbmodulos", "count(*) total", "WHERE modulos_projeto_id='" . $this->form_data['modulos_projeto_id'] . "' AND modulos_title='" . $this->form_data['modulos_title'] . "' AND modulos_modulo='" . $this->form_data['modulos_modulo'] . "' AND modulos_controller='" . $this->form_data['modulos_controller'] . "' AND modulos_model='" . $this->form_data['modulos_model'] . "' AND modulos_table='" . $this->form_data['modulos_table'] . "' AND modulos_db_prefixo='" . $this->form_data['modulos_db_prefixo'] . "' AND modulos_primary_key='" . $this->form_data['modulos_primary_key'] . "'");

            if ($result[0]["total"] <= 0) {
                $r = $this->db->insert('tbmodulos', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['modulos_title']} criado(a) com sucesso!!");
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


            if (empty($this->form_data['modulos_projeto_id'])) {
                TMessenger::Error("Preencha o campo Projeto!");
                return;
            }

            if (empty($this->form_data['modulos_title'])) {
                TMessenger::Error("Preencha o campo Título!");
                return;
            }

            if (empty($this->form_data['modulos_modulo'])) {
                TMessenger::Error("Preencha o campo Módulo!");
                return;
            }

            if (empty($this->form_data['modulos_controller'])) {
                TMessenger::Error("Preencha o campo Controller!");
                return;
            }

            if (empty($this->form_data['modulos_model'])) {
                TMessenger::Error("Preencha o campo Model!");
                return;
            }

            if (empty($this->form_data['modulos_table'])) {
                TMessenger::Error("Preencha o campo Tabela!");
                return;
            }

            if (empty($this->form_data['modulos_db_prefixo'])) {
                TMessenger::Error("Preencha o campo Prefixo!");
                return;
            }

            if (empty($this->form_data['modulos_primary_key'])) {
                TMessenger::Error("Preencha o campo Primary Key!");
                return;
            }



            if (!isset($this->form_data['modulos_field_status'])) {
                $this->form_data['modulos_field_status'] = false;
            } else {
                $this->form_data['modulos_field_status'] = true;
            }


            $fields = "modulos_projeto_id='" . $this->form_data["modulos_projeto_id"] . "', " . "modulos_title='" . $this->form_data["modulos_title"] . "', " . "modulos_modulo='" . $this->form_data["modulos_modulo"] . "', " . "modulos_controller='" . $this->form_data["modulos_controller"] . "', " . "modulos_model='" . $this->form_data["modulos_model"] . "', " . "modulos_table='" . $this->form_data["modulos_table"] . "', " . "modulos_db_prefixo='" . $this->form_data["modulos_db_prefixo"] . "', " . "modulos_primary_key='" . $this->form_data["modulos_primary_key"] . "', " . "modulos_field_default='" . $this->form_data["modulos_field_default"] . "', " . "modulos_field_status='" . $this->form_data["modulos_field_status"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbmodulos', $fields, 'modulos_id=' . $_REQUEST['modulos_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['modulos_title']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete()
    {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbmodulos', 'modulos_id="' . $_REQUEST['modulos_id'] . '"');

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
            $true = $db->update('tbmodulos', 'modulos_status= 1 - modulos_status', 'modulos_id=' . $_REQUEST['modulos_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['modulos_title'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['modulos_title'] . "'.");
                return;
            }
        }
    }
}