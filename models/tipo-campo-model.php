<?php

class TipoCampoModel extends MainModel {

    public $form_data;
    public $form_msg;
    public $db;

    public function __construct($db = false) {
        $this->db = $db;
    }

    public function getDataForm() {
        $this->form_data = isset($_REQUEST['data']) ? $_REQUEST['data'] : '';
    }
    private function currencyFormatSQL($valor)
    {
        $tmp = str_replace('.', '', $valor);
        $tmp = str_replace(',', '.', $tmp);
        return $tmp;
    }
    public function save() {

        if ($this->form_data != '') {

            
            if (empty($this->form_data['tipo_campo_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }
            
            
            

            $fields = array(
                'tipo_campo_nome'
            );

            $values = array(
                
$this->form_data['tipo_campo_nome']
            );

            $this->db = new Database();
            $result = $this->db->select("tbtipo_campo", "count(*) total","WHERE tipo_campo_nome='" . $this->form_data['tipo_campo_nome'] . "'");

            if($result[0]["total"] <= 0){
                $r = $this->db->insert('tbtipo_campo', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['tipo_campo_nome']} criado(a) com sucesso!!");
                } else {
                    TMessenger::Error('Erro ao criar item!!');
                }
            }else{
                TMessenger::Error('Erro ao criar item, dado existente!!');
            }
            
        }
    }

    public function update() {

        if ($this->form_data != '') {

            
            if (empty($this->form_data['tipo_campo_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }
            

            
            
            $fields = "tipo_campo_nome='" . $this->form_data["tipo_campo_nome"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbtipo_campo', $fields, 'tipo_campo_id=' . $_REQUEST['tipo_campo_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['tipo_campo_nome']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete() {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbtipo_campo', 'tipo_campo_id="' . $_REQUEST['tipo_campo_id'] . '"');

            if ($r) {
                TMessenger::Confirm('Removido com sucesso!!');
                return;
            }

            TMessenger::Error('Erro ao remover!!');
        }
    }

    public function setEnable() {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "enable") {
            $db = new Database();

            //INSERE O DADO
            $true = $db->update('tbtipo_campo', '= 1 - ', 'tipo_campo_id=' . $_REQUEST['tipo_campo_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['tipo_campo_nome'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['tipo_campo_nome'] . "'.");
                return;
            }
        }
    }
}