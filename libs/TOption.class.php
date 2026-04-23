<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TOption
 *
 * @author vinic
 */
class TOption extends TElement {
    //put your code here
    public function __construct($text, $value="",$selected =false) {
        parent::__construct('option');
        $this->value = $value;
        if($selected === true) $this->selected = 'true';
        $this->add($text);
    }
}
