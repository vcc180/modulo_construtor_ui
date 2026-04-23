<?php

class TipoUsuarioModel extends MainModel
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

    private function configuraPermissoes()
    {
        $M = $this->form_data['MENU'];
        $this->form_data['MENU'] = array();
        $this->form_data['MENU']['HOME'] = 'HOME';
        $this->form_data['PERMISSOES'][] = 'any';
        foreach ($M as $key => $value) {
            $this->form_data['MENU'][$key] = $value;
            foreach ($value as $k => $v) {
                $this->form_data['PERMISSOES'][] = $v;
            }
        }
        $this->form_data['MENU']['LOGOUT'] = 'LOGOUT';

        $permissoes = serialize(array('any', 'MENU' => $this->form_data['MENU'], 'PERMISSOES' => $this->form_data['PERMISSOES']));
        $permissoes = str_replace('"', '\"', $permissoes);

        return $permissoes;
    }

    public function save()
    {

        if ($this->form_data != '') {


            if (empty($this->form_data['user_type_descricao'])) {
                TMessenger::Error("Preencha o campo Descrição!");
                return;
            }



            $fields = array(
                'user_type_descricao',
                'user_type_permicoes'
            );

            $values = array(
                $this->form_data['user_type_descricao'],
                $this->configuraPermissoes()
            );

            $this->db = new Database();
            $result = $this->db->select("tbuser_type", "count(*) total", "WHERE user_type_descricao='" . $this->form_data['user_type_descricao'] . "' AND user_type_permicoes='" . $this->form_data['user_type_permicoes'] . "'");

            if ($result[0]["total"] <= 0) {
                $r = $this->db->insert('tbuser_type', $fields, $values);

                if ($r) {
                    TMessenger::Confirm("{$this->form_data['user_type_descricao']} criado(a) com sucesso!!");
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


            if (empty($this->form_data['user_type_descricao'])) {
                TMessenger::Error("Preencha o campo Descrição!");
                return;
            }



            $permissoes = $this->configuraPermissoes();
            
            

            $fields = "user_type_descricao='" . $this->form_data["user_type_descricao"] . "', " . "user_type_permicoes='" . $permissoes . "'";
            $this->db = new Database();
            $r = $this->db->update('tbuser_type', $fields, 'user_type_id=' . $_REQUEST['user_type_id']);

            if ($r) {
                TMessenger::Confirm("{$this->form_data['user_type_descricao']} atualizado com sucesso!!");
            } else {
                TMessenger::Error('Erro ao atualizar!!');
            }
        }
    }

    public function delete()
    {

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" && $_REQUEST['confirm'] == 'true') {
            $this->db = new Database();
            $r = $this->db->delete('tbuser_type', 'user_type_id="' . $_REQUEST['user_type_id'] . '"');

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
            $true = $db->update('tbuser_type', '= 1 - ', 'user_type_id=' . $_REQUEST['user_type_id']);
            if ($true) {
                TMessenger::Confirm("Status do item '" . $_REQUEST['user_type_descricao'] . "' modificado com sucesso");
                return;
            } else {
                TMessenger::Error("Erro ao modificado o status do item '" . $_REQUEST['user_type_descricao'] . "'.");
                return;
            }
        }
    }
}