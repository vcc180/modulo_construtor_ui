<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include_once("../config.php");
include_once("../libs/Database.class.php");

$db = new Database();
$PROJETO = array(
    'project_title' => "",
    'project_name' => "",
    'project_path' => "",
    'project_url' => "",
    'db_hostname' => "",
    'db_database' => "",
    'db_user' => "",
    'db_password' => "",
    'MENUS' => [],
    'modulos' => []
);
$temp = $db->select('tbprojeto', "*", "WHERE projeto_id=" . $_REQUEST['projeto_id']);

if (count($temp) < 0) {
    die(array('error' => 1, "msg" => "Não foi selecionado o projeto"));
}

foreach ($temp as $key => $value) {
    // print_r($value);
    $PROJETO['project_title']  = $value['projeto_title'];
    $PROJETO['project_name']  = $value['projeto_name'];
    $PROJETO['project_path']  = $value['projeto_path'];
    $PROJETO['project_url']  = $value['projeto_url'];
    $PROJETO['db_hostname']  = $value['projeto_db_hostname'];
    $PROJETO['db_database']  = $value['projeto_db_database'];
    $PROJETO['db_user']  = $value['projeto_user'];
    $PROJETO['db_password']  = $value['projeto_password'];
}

//MENUS
unset($temp);
$temp = $db->select('tbmenu', '*', "where menu_projeto_id=" . $_REQUEST['projeto_id']);
$MENUS = array();

if (count($temp) > 0) {
    foreach ($temp as $key => $value) {
        $MENUS[][$value['menu_nome']] = array(
            "TITLE" => $value['menu_title'],
            "SUB_MENU" => $value['menu_submenu'],
            "ICON" => $value['menu_icon'],
            "MENUS" => []
        );
    }
}

//SUBMENU
unset($temp);
$temp = $db->select('view_submenu', '*', "where menu_projeto_id=" . $_REQUEST['projeto_id']);
function searchMenu($search, $array)
{
    foreach ($array as $key => $value) {
        if ($search === key($value)) {
            return $key;
        }
    }
    return -1;
}

if (count($temp) > 0) {
    foreach ($temp as $key => $value) {
        $chave = searchMenu($value['menu_nome'], $MENUS);
        if ($chave < 0) {
            continue;
        }
        $MENUS[$chave][$value['menu_nome']]['MENUS'][$value['submenu_nome']] = array(
            "TITLE" => $value['submenu_title'],
            "LINK" => $value['submenu_link'],
        );
    }
}

$PROJETO['MENUS'] = $MENUS;

//MODULOS
$temp = $db->select('tbmodulos', '*', "where modulos_projeto_id=" . $_REQUEST['projeto_id']);
$MODULO = array();

if (count($temp) > 0) {
    foreach ($temp as $key => $value) {
        $MODULO[] = array(
            "modulo_title" => $value['modulos_title'],
            "modulo" => $value['modulos_modulo'],
            "controller" => $value['modulos_controller'],
            "model" => $value['modulos_model'],
            "table" => $value['modulos_table'],
            "db_prefixo" => $value['modulos_db_prefixo'],
            "primary_key" => $value['modulos_primary_key'],
            "field_default" => $value['modulos_field_default'],
            "field_status" => $value['modulos_field_status'],
            "campos" => array(),
        );
    }
}

$PROJETO['modulos'] = $MODULO;
die(json_encode($PROJETO));
