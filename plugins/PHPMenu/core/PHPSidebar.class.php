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

namespace Plugin\PHPSidebar;

class PHPSidebar {

    //put your code here
    private $MENU_JSON;
    private $MENU_ARRAY = ARRAY();
    private $PERMISSION = ARRAY();
    private $URL;

    public function __construct($PERMISSION, $URL) {
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
        echo '<div class="sidebar">';
        echo '<div class="logo-details">';
        echo "<i class='bx bx-category'></i>";
        echo '<span class = "logo-name">ACADÊMICO</span></div>';
        echo '<ul class = "nav-links">';

        foreach ($this->PERMISSION as $KEY => $VALUE) {
            if (!is_array($VALUE)) {
                echo '<li><a href="' . $this->MENU_ARRAY[$VALUE]['LINK'] . '"><i class="' . $this->MENU_ARRAY[$VALUE]['ICON'] . '"></i><span class="link-name">' . $this->MENU_ARRAY[$VALUE]['TITLE'] . '</span></a><ul class="sub-menu blank"><li><a class="link-name"  href="' . $this->MENU_ARRAY[$VALUE]['LINK'] . '">' . $this->MENU_ARRAY[$VALUE]['TITLE'] . '</a></li></ul></li>';
            } else {
                echo '<li><div class="iocn-link"><a href="#"><i class="' . $this->MENU_ARRAY[$KEY]['ICON'] . '" ></i>';
                echo '<span class="link-name">' . $this->MENU_ARRAY[$KEY]['TITLE'] . '</span></a><i class="bx bxs-chevron-down arrow" ></i></div>';
                echo '<ul class="sub-menu"><li><a class="link-name" href="#">' . $this->MENU_ARRAY[$KEY]['TITLE'] . '</a></li>';

                foreach ($VALUE as $key => $value) {
                    echo '<li><a href="' . $this->MENU_ARRAY[$KEY][$value]['LINK'] . '">' . $this->MENU_ARRAY[$KEY][$value]['TITLE'] . '</a></li>';
                }
                echo '</ul></li>';
            }
        }

        echo '</ul></div><section class="wrap-content"><div class="menu"><i class="bx bx-menu"></i><span class = "text"></span>';

        echo '<div class = "menu-perfil"><img class = "perfil-photo" src="' . PATH_UPLOADS_IMG . $_SESSION['USER_DATA']['user_img'] . '"/>';
        echo '<div class = "perfil-detalhe"><span class = "perfil-name">' . $_SESSION['USER_DATA']['user_name'] . '</span><span class = "perfil-job" style="text-transform: uppercase;">' . $this->getTipeUser($_SESSION['USER_DATA']['fk_user_type_id'])  . '</span></div>';
            
        
        
        echo '<a href="' . HOME_URI . 'logout"><i class ="bx bx-exit"></i></a></div></div>';
    }

    public static function getStyle() {
        echo '<link rel="stylesheet" href="plugins/PHPMenu/core/phpmenu.css?ID=' . time() . '" rel="stylesheet" type="text/css">';
        echo '<link rel="stylesheet" href="plugins/PHPMenu/core/icons/fonts-icons.css?ID=' . time() . '" rel="stylesheet" type="text/css">';
    }

    public static function getPermissoes() {
        $FILE_JSON = file_get_contents(__DIR__ . '/config.json');
        return json_decode($FILE_JSON);
    }
    
    private function getTipeUser($tipe){
        $result = '';
        switch ($tipe) {
            case 1:
                $result = 'Super Usuário';
                break;
            case 2:
                $result = 'Administrador(a)';
                break;
            case 3:
                $result = 'Funcionário(a)';
                break;
            case 4:
                $result = 'Professor(a)';
                break;
            case 5:
                $result = 'Aluno(a)';
                break;
            case 6:
                $result = 'Reponsável';
                break;

            default:
                break;
        }
        return $result;
    }

}
