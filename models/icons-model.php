<?php

class IconsModel extends MainModel {

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

            
            if (empty($this->form_data['icons_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }
            
            if (empty($this->form_data['icons_icon'])) {
                TMessenger::Error("Preencha o campo Icon!");
                return;
            }
            
            
            

            $fields = array(
                'icons_nome',
'icons_icon'
            );

            $values = array(
                
$this->form_data['icons_nome'],
$this->form_data['icons_icon']
            );

            $this->db = new Database();
            $result = $this->db->select("tbicons", "count(*) total","WHERE icons_nome='" . $this->form_data['icons_nome'] . "' AND icons_icon='" . $this->form_data['icons_icon'] . "'");

            if($result[0]["total"] <= 0){
                $r = $this->db->insert('tbicons', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['icons_nome']} criado(a) com sucesso!!");
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

            
            if (empty($this->form_data['icons_nome'])) {
                TMessenger::Error("Preencha o campo Nome!");
                return;
            }
            
            if (empty($this->form_data['icons_icon'])) {
                TMessenger::Error("Preencha o campo Icon!");
                return;
            }
            

            
            
            $fields = "icons_nome='" . $this->form_data["icons_nome"] . "', " ."icons_icon='" . $this->form_data["icons_icon"] . "'";
            $this->db = new Database();
            $r = $this->db->update('tbicons', $fields, 'icons_id=' . $_REQUEST['icons_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['icons_nome']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete() {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbicons', 'icons_id="' . $_REQUEST['icons_id'] . '"');

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
            $true = $db->update('tbicons', '= 1 - ', 'icons_id=' . $_REQUEST['icons_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['icons_nome'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['icons_nome'] . "'.");
                return;
            }
        }
    }
}