<?php

include_once("../config.php");
include_once("../libs/Database.class.php");

header('Content-Type: application/json');

header('Cache-Control: no-cache, no-store, must-revalidate');

$db = new Database();

$projeto_id = intval($_REQUEST['projeto_id']); // segurança básica

$PROJETO = [
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
];

/*************************/
// PROJETO
/*************************/
$temp = $db->select('tbprojeto', "*", "WHERE projeto_id=" . $projeto_id);

if (count($temp) <= 0) {
    echo json_encode(['error' => 1, "msg" => "Projeto não encontrado"]);
    exit;
}

$value = $temp[0];

$PROJETO['project_title']  = $value['projeto_title'];
$PROJETO['project_name']  = $value['projeto_name'];
$PROJETO['project_path']  = $value['projeto_path'];
$PROJETO['project_url']  = $value['projeto_url'];
$PROJETO['db_hostname']  = $value['projeto_db_hostname'];
$PROJETO['db_database']  = $value['projeto_db_database'];
$PROJETO['db_user']  = $value['projeto_user'];
$PROJETO['db_password']  = $value['projeto_password'];

/*************************/
// MENUS
/*************************/
$temp = $db->select('tbmenu', '*', "where menu_projeto_id=" . $projeto_id);
$MENUS = [];

foreach ($temp as $value) {
    $MENUS[$value['menu_nome']] = [
        "TITLE" => $value['menu_title'],
        "SUB_MENU" => $value['menu_submenu'],
        "ICON" => $value['menu_icon'],
        "MENUS" => []
    ];
}

/*************************/
// SUBMENU
/*************************/
$temp = $db->select('view_submenu', '*', "where menu_projeto_id=" . $projeto_id);

foreach ($temp as $value) {
    if (!isset($MENUS[$value['menu_nome']])) continue;

    $MENUS[$value['menu_nome']]['MENUS'][$value['submenu_nome']] = [
        "TITLE" => $value['submenu_title'],
        "LINK" => $value['submenu_link'],
    ];
}

$PROJETO['MENUS'] = array_values($MENUS);

/*************************/
// MODULOS
/*************************/
$temp = $db->select('view_modulos', '*', "where modulos_projeto_id=" . $projeto_id);
$MODULO = [];

foreach ($temp as $value) {
    $MODULO[$value['modulos_modulo']] = [
        "modulo_title" => $value['modulos_title'],
        "modulo" => $value['modulos_modulo'],
        "controller" => $value['modulos_controller'],
        "model" => $value['modulos_model'],
        "table" => $value['modulos_table'],
        "db_prefixo" => $value['modulos_db_prefixo'],
        "primary_key" => $value['modulos_primary_key'],
        "field_default" => $value['modulos_field_default'],
        "field_status" => $value['modulos_field_status'],
        "campos" => []
    ];
}

/*************************/
// CAMPOS MODULO
/*************************/
$temp = $db->select('view_modulo_campo', '*', "where projeto_id=" . $projeto_id);

foreach ($temp as $value) {
    $moduloNome = $value['modulos_modulo'];

    if (!isset($MODULO[$moduloNome])) continue;

    $MODULO[$moduloNome]['campos'][] = [
        "title" => $value['modulo_campo_title'],
        "nome" => $value['modulo_campo_nome'],
        "tipo" => $value['tipo_campo_nome'],
        "fk" => ($value['modulo_campo_fk'] == true) ? "true": "false",
        "reference_table" => $value['modulo_campo_reference_table'],
        "reference_key" => $value['modulo_campo_reference_key'],
        "reference_option" => $value['modulo_campo_reference_option'],
        "required" => ($value['modulo_campo_required'] == true) ? "true": "false",
        "is_search" => ($value['modulo_campo_is_search']) ? "true": "false"
    ];
}

$PROJETO['modulos'] = array_values($MODULO);

/*************************/
// OUTPUT
/*************************/
echo json_encode($PROJETO, JSON_PRETTY_PRINT);
header('Content-Disposition: attachment; filename="' . $PROJETO['project_name'] .'.json"');