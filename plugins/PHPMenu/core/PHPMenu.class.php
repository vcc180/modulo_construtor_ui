<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppMenu
 *
 * @author vinic
 */

namespace Plugin\PHPMenu;

include __DIR__ . '/TMessenger.class.php';

class PHPMenu {

    //put your code here
    private $MENU_JSON;
    private $MENU_ARRAY = ARRAY();
    private $PERMISSION = ARRAY();
    private $URL;

    public function __construct($PERMISSION,$URL) {
        $this->PERMISSION = $PERMISSION;
        $this->URL = $URL;

        //LER O ARQUIVO JSON
        $this->load_config();
        $this->gerar_menus();
    }

    /*
     * FUNÇÃO: LOAD_CONFIG
     * DESCRIÇÃO: CARREGA O ARQUIVO DE CONFIGURAÇÕES E PREPARA O JSON
     */

    private function load_config() {
        //NOME DO ARQUIVO DE CONFIGURAÇÃO
        $FILE_JSON = file_get_contents(__DIR__ . '/config.json');

        //decodificando os dados armazenados para um array
        $this->MENU_JSON = json_decode($FILE_JSON);

        
        foreach ($this->MENU_JSON->MENUS as $KEY => $VALUE) {
            if ($VALUE->SUB_MENU == FALSE) {

                $this->MENU_ARRAY[$KEY]['TITLE'] = $VALUE->TITLE;
                $this->MENU_ARRAY[$KEY]['SUB_MENU'] = $VALUE->SUB_MENU;
                $this->MENU_ARRAY[$KEY]['ICON'] = $VALUE->ICON;
                $this->MENU_ARRAY[$KEY]['LINK'] = $this->URL . $VALUE->LINK;
            } else {

                $this->MENU_ARRAY[$KEY]['TITLE'] = $VALUE->TITLE;
                $this->MENU_ARRAY[$KEY]['SUB_MENU'] = $VALUE->SUB_MENU;
                $this->MENU_ARRAY[$KEY]['ICON'] = $VALUE->ICON;

                foreach ($VALUE->MENUS as $key => $value) {
                    $this->MENU_ARRAY[$KEY][$key]['TITLE'] = $value->TITLE;
                    $this->MENU_ARRAY[$KEY][$key]['ICON'] = $value->ICON;
                    $this->MENU_ARRAY[$KEY][$key]['LINK'] = $this->URL . $value->LINK;
                }
            }
        }
    }

    private function gerar_menus() {
        //ABRE DIV DO MENU
        ECHO '<div id="menu"><input type="checkbox" id="bt_menu"><label for="bt_menu"> </label><nav class="menu-vertical"><ul>';

        foreach ($this->PERMISSION as $KEY => $VALUE) {
            if (!is_array($VALUE)) {
                echo '<li><a class="' . $this->MENU_ARRAY[$VALUE]['ICON'] . '" href="' . $this->MENU_ARRAY[$VALUE]['LINK'] . '">' . $this->MENU_ARRAY[$VALUE]['TITLE'] . '</a></li>';
            } else {
                echo '<li>';
                echo '<a class="' . $this->MENU_ARRAY[$KEY]['ICON'] . '" href="#">'.$this->MENU_ARRAY[$KEY]['TITLE'].'</a><ul>';
                foreach ($VALUE as $key => $value) {
                        echo '<li><a class="' . $this->MENU_ARRAY[$KEY][$value]['ICON'] . '" href="' . $this->MENU_ARRAY[$KEY][$value]['LINK'] . '">' . $this->MENU_ARRAY[$KEY][$value]['TITLE'] . '</a></li>';
                }
                echo '</li></ul>';
            }
        }
        ECHO '</ul></nav></div>';
    }
    
    
    public static function getStyle() {
        echo '<link rel="stylesheet" href="plugins/PHPMenu/core/phpmenu.css?ID=' .time().'" rel="stylesheet" type="text/css">';
        echo '<link rel="stylesheet" href="plugins/PHPMenu/core/icons/fonts-icons.css?ID=' .time().'" rel="stylesheet" type="text/css">';
    }
    
    public static function getPermissoes() {
        $FILE_JSON = file_get_contents(__DIR__ . '/config.json');
        return json_decode($FILE_JSON);
    }

}
