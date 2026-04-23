<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MedicamentoModel
 *
 * @author PC01
 */
class HomeModel extends MainModel {

    /**
     * $form_data
     * Os dados do formulÃ¡rio de envio.
     * @access public
     */
    public $form_data;

    /**
     * $form_msg
     * As mensagens de feedback para o usuÃ¡rio.
     * @access public
     */
    public $form_msg;

    /**
     * $db
     * O objeto da nossa conexÃ£o PDO
     * @access public
     */
    public $db;

    /**
     * Construtor
     * Carrega  o DB.
     * @since 0.1
     * @access public
     */
    public function __construct($db = false) {
        $this->db = $db;
    }

    public function fromMsg() {
        if (is_array($this->form_msg)) {
            echo "<div class='{$this->form_msg[0]}'>{$this->form_msg[1]}</div>";
        }
    }

//end getMsg()

    public function getDataForm() {
        $this->form_data = isset($_GET['dados']) ? $_GET['dados'] : '';
        $this->form_data = isset($_POST['dados']) ? $_POST['dados'] : '';
    }

}
