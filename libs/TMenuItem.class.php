<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TMenuItem
 *
 * @author VANESSA
 */
class TMenuItem extends TElement {

    //put your code here
    private $ul;

    public function __construct($nome,$icone = null) {
        parent::__construct('li');
        $this->ul = new TElement("ul");
        $a = new TElement("a");
        if ($icone != null) {
            $icon = new TElement('i'); //Instancia icone
            $icon->class = 'mn-icon ' . $icone; //atribui o icone de matricula
            $a->add($icon);
        }
        $a->add($nome);
        $this->add($a);
        $this->class = "has-sub";
        parent::add($this->ul);
    }

    public function _AddItem($nome, $url, $icone = null) {
        $li = new TElement('li');
        $a = new TElement('a');
        $a->add($nome);
        $a->href = HOME_URI . $url;
        if ($icone != null) {
            $icon = new TElement('i'); //Instancia icone
            $icon->class = 'mn-icon ' . $icone; //atribui o icone de matricula
            $a->add($icon);
        }
        $li->add($a);

        $this->ul->add($li);
    }

    public function AddSubmenu($menu, $icone = null) {
        if ($icone != null) {
            echo "ok";
            $icon = new TElement('i'); //Instancia icone
            $icon->class = 'mn-icon ' . $icone; //atribui o icone de matricula
            $menu->add($icon);
            $this->ul->add($menu);
            return;
        }
        $this->ul->add($menu);
    }

    public function AddSubmenuLevel2($name, $array = Array(), $icone = null) {
        $li = new TElement('li');

        $a = new TElement('a');
        $a->add($name);
        $li->add($a);


        if ($array != null) {

            $ul_submenu = new TElement('ul');

            foreach ($array as $key) {
                $li_sub = new TElement("li");
                $a_sub = new TElement("a");
                $a_sub->add($key[0]);
                $a_sub->href = HOME_URI . '/' . $key[1];
                if ($icone != null) {
                    $icon = new TElement('i'); //Instancia icone
                    $icon->class = 'mn-icon ' . $icone; //atribui o icone de matricula
                    $a_sub->add($icon);
                }
                $li_sub->add($a_sub);
                $ul_submenu->add($li_sub);
            }
            $li->add($ul_submenu);
        }
        $this->ul->add($li);
    }

}
