<?php

#include_once './Database.class.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TForm
 *
 * @author vinic
 */
class TForm {

    const TYPE_INPUT_TEXT = 'text';
    const TYPE_INPUT_PASSWORD = 'password';
    const TYPE_INPUT_NUMERIC = 'number';
    const TYPE_INPUT_SUBMIT = 'submit';
    const TYPE_INPUT_CHECKBOX = 'checkbox';
    const TYPE_INPUT_BUTTON = 'button';
    const TYPE_INPUT_EMAIL = 'email';
    const TYPE_INPUT_COLOR = 'color';
    const TYPE_INPUT_DATE = 'date';
    const TYPE_INPUT_DATETIME_LOCAL = 'datetime-local';
    const TYPE_INPUT_FILE = 'file';
    const TYPE_INPUT_HIDDEN = 'hidden';
    const TYPE_INPUT_IMAGE = 'image';
    const TYPE_INPUT_MONTH = 'month';
    const TYPE_INPUT_RADIO = 'radio';
    const TYPE_INPUT_RANGE = 'range';
    const TYPE_INPUT_RESET = 'reset';
    const TYPE_INPUT_SEARCH = 'search';
    const TYPE_INPUT_TEL = 'tel';
    const TYPE_INPUT_TIME = 'time';
    const TYPE_INPUT_URL = 'url';
    const TYPE_INPUT_WEEK = 'week';

    //put your code here
    private $data;
    private $form;

    public static function initFuctions($array = array()) {
        $return = '';
        
        if (count($array) > 0) {
            foreach ($array as $key => $value) {
                $return .= "$key='$value' ";
            }
            
            
        }
        return $return;
    }

    public static function InputText($type, $name, $value = '', $w = '300px', $required = FALSE, $id = '', $Addclass = '', $functions = array(),$disabled = false) {

        $funct = TForm::initFuctions($functions); //
        $id = (!empty($id) ? 'id="' . $id . '" ' : '');
        $req = (($required == TRUE) ? 'required ' : '');
        $dis = (($disabled == TRUE) ? 'disabled ' : '');
        $checked = ($type == 'checkbox' && (isset($_REQUEST['data'][$name])  || $value=='TRUE')) ? 'checked' : '';
        
        
        echo "<input {$funct} {$dis} {$id} {$checked} " . ' style="width:' . $w . ';" type="' . $type . '" class="' . $Addclass .' txt_input" name="data[' . $name . ']" value="' . $value . '" ' . $req . '/>';
    }

    public static function InputSubmit($name, $value) {
        echo '<input type="submit" class="bt_input" name="data[' . $name . ']" value="' . $value . '"/>';
    }

    public static function InputButton($name, $value, $action = '', $class = 'bt_input') {
        echo '<input type="button" onclick="' . $action . '" class="' . $class . '" name="data[' . $name . ']" value="' . $value . '"/>';
    }

    public static function textArea($name, $value = '', $heght = 5, $id = 'txt_input') {
        echo '<textarea  rows="' . $heght . '"  style="resize: none" id="' . $id . '" class="txt_input" name="data[' . $name . ']" >' . $value . '</textarea>';
    }

    public static function select($name, $options = array(), $select = '', $w = '300px', $id = '') {
        echo '<select class="txt_input" style="width:' . $w . ';" name="data[' . $name . ']">';
        echo '<option value="">Selecione...</option>';
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                if ($select == $value) {
                    echo '<option selected value="' . $value . '">' . $key . '</option>';
                } else {
                    echo '<option value="' . $value . '">' . $key . '</option>';
                }
            }
        }
        echo '</select>';
    }

    public static function setInputSelect($campo, $tabela, $id, $descricao, $modelo, $where = '', $selected = '', $required = false, $fields = '') {
        $required = ($required) ? 'required' : '';
        echo '<select class="txt_input" name="data[' . $campo . ']" id="' . $campo . '" ' . $required . '>';
        echo'<option value="">Selecione...</option>';

        $db = new Database(); //Instancia Banco de Dados
        $field = (empty($fields) ? $id . ',' . $descricao : $fields);
        $array = $db->select($tabela, $field, $where); //Select Table

        foreach ($array as $key) {
            $rs = (!empty($modelo->form_data) ? $modelo->form_data[$campo] : '');
            if ($rs == $key[$id] || $selected == $key[$id]) {
                echo '<option selected value="' . $key[$id] . '">' . $key[$descricao] . '</option>';
            } else {
                echo '<option value="' . $key[$id] . '">' . $key[$descricao] . '</option>';
            }//End if
        }//End Foreach
        echo '</select>'; //End Select
    }

}
