<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TMessenger
 *
 * @author vinic
 */
//<div id="messager-box-background">
//    <div id="messager-box">
//        <div id="messager-box-header">Window <a class="close" href="#" onclick="close()">X</a></div>
//        <div id="messager-box-content">Deseja Realmente Cancelar</div>
//        <div id="messager-box-footer">
//            <a class="color-1" href="#">Sim</a>
//            <a class="color-2" href="#">Não</a>
//        </div>
//    </div>
//</div>


//#messager-box-background{height: 100vh;width: 100%; background-color: rgba(0,0,0,0.7); position: fixed;top: 0;left: 0;z-index: 10000;box-sizing: content-box;}
//#messager-box{width: 600px; background-color: white;margin: 25vh auto; box-sizing: content-box;}
//#messager-box-header{width: 100%;padding: 25px;border-bottom: 1px solid #ccc; background-color: white;}
//#messager-box-header .close{padding: 25px; font-size: 15px;text-align: center;float: right;top: -25px;right: -25px;position: relative;color: #777;}
//#messager-box-content{width: 100%;min-height: 150px; padding: 15px 25px; padding-bottom: 5px;}
//#messager-box-footer{width: 100%; padding: 25px;border-top: 1px solid #ccc; background-color: none;margin-bottom: 5px;}
//#messager-box-footer a{padding: 12px 45px;border-radius: 8px;text-decoration: none;color: white;clear: both;}
//#messager-box-footer a:hover{text-decoration: underline;}
//#messager-box-footer .color-1{background-color: #339900;border: 1px solid #777;}
//#messager-box-footer .color-2{background-color: #2EACB8;border: 1px solid #777;}
class TMessenger {

    //put your code here
    public static function Confirm($text) {
        echo "<div class='Confirm'>{$text}</div>";
    }

    public static function Error($text) {
        echo "<div class='Error'>{$text}</div>";
    }

    public static function alert($text) {
        echo "<div class='alert'>{$text}</div>";
    }

    
    public static function mensager_ok($text,$yes='#') {
        echo '<div id = "messager-box-background">';
        echo '<div id = "messager-box">';
        echo '<div id = "messager-box-header">Alerta! <a class = "close" href = "'.$yes.'" onclick = "close()">X</a></div>';
        echo "<div id=\"messager-box-content\">{$text}</div>";
        echo '<div id="messager-box-footer">';
        echo "<a class=\"color-1\" href=\"{$yes}\">Ok</a> ";
        echo '</div></div></div>';

//        echo "<div class='Question'>{$text} <a href='{$yes}'>Sim</a> / <a href='{$no}'>Não</a></div>";
    }
    public static function Question($text, $yes = '#', $no = '#',$target =false) {
        $target = ($target==true ? 'target="_blank"' :'');
        echo '<div id = "messager-box-background">';
        echo '<div id = "messager-box">';
        echo '<div id = "messager-box-header">Alerta! <a class = "close" href = "'.$no.'" onclick = "close()">X</a></div>';
        echo "<div id=\"messager-box-content\">{$text}</div>";
        echo '<div id="messager-box-footer">';
        echo "<a {$target} class=\"color-1\" href=\"{$yes}\">Sim</a> ";
        echo "<a class=\"color-2\" href=\"{$no}\">Não</a>";
        echo '</div></div></div>';

//        echo "<div class='Question'>{$text} <a href='{$yes}'>Sim</a> / <a href='{$no}'>Não</a></div>";
    }

    public static function debbug($param) {
        if (is_array($param)) {
            echo '<pre>';
            print_r($param);
            echo '</pre>';
        } else {
            echo $param;
        }
    }

}
