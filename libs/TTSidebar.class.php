<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of APPMenu
 *
 * @author vinic
 */
class TTSidebar {

    //put your code here
    private $MENU = array();
    private $MENU_ITENS = array();

    public function show() {
        echo '<div class="sidebar">';
        echo '<div class="logo-details">';
        echo "<i class = 'bx bxl-meta' ></i>";
        echo '<span class = "logo-name">ACADÊMICO</span></div>';
        echo '<ul class = "nav-links">';

        echo '<li><a href="#"><i class="' . $this->MENU['HOME']['ICON'] . '"></i><span class="link-name">' . $this->MENU['HOME']['TEXT'] . '</span></a><ul class="sub-menu blank"><li><a class="link-name" href="' . $this->MENU['HOME']['LINK'] . '">' . $this->MENU['HOME']['TEXT'] . '</a></li></ul></li>';

        echo '</ul></div><section class="wrap-content"><div class="menu"><i class="bx bx-menu"></i><span class = "text">EGSM</span>';

        echo '<div class = "menu-perfil"><img class = "perfil-photo" src="' . PATH_UPLOADS_IMG . $_SESSION['USER_DATA']['user_img'] . '"/>';
        echo '<div class = "perfil-detalhe"><span class = "perfil-name">Vinícius C. Carvalho</span><span class = "perfil-job">Administrador</span></div>';
        echo '<a href="' . HOME_URI . 'logout"><i class ="bx bx-exit"></i></a></div></div>';

        return;
        
        echo '<div id="menu">';
        echo '<input type="checkbox" id="bt_menu"/>';
        echo '<label for="bt_menu"> </label>';
        echo '<nav class="menu-vertical">';
        echo '<ul>';

        echo '<li><a class="' . $this->MENU['HOME']['ICON'] . '" href="' . $this->MENU['HOME']['LINK'] . '">' . $this->MENU['HOME']['TEXT'] . '</a></li>';
        foreach ($this->MENU_ITENS AS $KEY => $VALEU) {

            if (!is_array($VALEU)) {
                echo '<li><a class="' . $this->MENU[$VALEU]['ICON'] . '" href="' . $this->MENU[$VALEU]['LINK'] . '">' . $this->MENU[$VALEU]['TEXT'] . '</a></li>';
            } else {
                echo '<li><a class="mn-icon" href="#">' . $this->MENU[$KEY]['TEXT'] . '</a><ul>';
                foreach ($VALEU as $keys) {
                    echo '<li><a class="' . $this->MENU[$KEY][$keys]['ICON'] . '" href="' . $this->MENU[$KEY][$keys]['LINK'] . '">' . $this->MENU[$KEY][$keys]['TEXT'] . '</a></li>';
                }
                echo '</ul></li>';
            }
        }
        echo '<li><a class="' . $this->MENU['LOGOUT']['ICON'] . '" href="' . $this->MENU['LOGOUT']['LINK'] . '">' . $this->MENU['LOGOUT']['TEXT'] . '</a></li>';

        echo'</ul>';
        echo '</nav>';
        echo '</div>';
    }

    public function set($key, $value = '') {
        if (empty($value)) {
            $this->MENU_ITENS[$key] = $key;
        } else {
            $this->MENU_ITENS[$key][] = $value;
        }
    }

    public function setArray($array = array()) {
        $this->MENU_ITENS = $array;
    }

}
