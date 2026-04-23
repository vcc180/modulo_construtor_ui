<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PHPLogs
 *
 * @author vinic
 */
class PHPLogs {

    public static function setRegistro($dir, $action, $registro) {
        $MESES = ARRAY(
            "01" => 'Janeiro',
            "02" => 'Fevereiro',
            "03" => 'Março',
            "04" => 'Abril',
            "05" => 'Maio',
            "06" => 'Junho',
            "07" => 'Julho',
            "08" => 'Agosto',
            "09" => 'Setembro',
            "10" => 'Outubro',
            "11" => 'Novembro',
            "12" => 'Dezembro'
        );
        $dir_ano = $dir . '/' . date("Y");
        if (!file_exists($dir_ano)) {
            mkdir($dir_ano);
        }
        $dir_mes = $dir_ano . '/' . $MESES[date('m')];
        if (!file_exists($dir_mes)) {
            mkdir($dir_mes);
        }

        $filename = $dir_mes . '/logs-' . date('dmY') . '.log';
        $file = fopen($dirname . $filename, 'a+');
        fwrite($file, '[' . date('d/m/Y') . ']:[' . date('H:i:s') . ']['. $_SESSION['USER_DATA']['user_name'] .'][' . $action . ']:' . $registro . ";\n");
        fclose($file);
    }

}
