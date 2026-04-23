<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TMenu
 *
 * @author VANESSA
 */
class TMenu extends TElement {

    //put your code here
    private $menu;

    public function __construct($name) {
        parent::__construct('div');
        $this->id = $name;

        $this->menu = new TElement('ul');
        //$this->nav->add($this->ul);
        parent::add($this->menu);
    }

    public function addMenu($nome, $url, $icone = '') {
        $li = new TElement('li');
        $a = new TElement('a');
        $li->add($a);
        if ($icone !== '') {
            $icon = new TElement('i'); //Instancia icone
            $icon->class = 'mn-icon ' . $icone; //atribui o icone de matricula
            $a->add($icon);
        }
        $a->add($nome);
        $a->href = HOME_URI . $url;
        $this->menu->add($li);
    }

    public function addSubmenu($mn) {
        $this->menu->add($mn);
    }

}
