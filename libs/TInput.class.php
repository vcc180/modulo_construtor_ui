<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TInput
 *
 * @author vinic
 */
class TInput extends TElement {

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
    public function __construct($nome, $type) {
        parent::__construct('input');
        $this->name = $nome;
        $this->type = $type;
    }

}
