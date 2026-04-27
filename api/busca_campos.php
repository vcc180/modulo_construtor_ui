<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');
include("../config.php");
include("../libs/Database.class.php");

$db = new Database();

$tabela = $_REQUEST['tabela'];

// proteção básica
$tabela = preg_replace('/[^a-zA-Z0-9_]/', '', $tabela);

$result = $db->select('tbmodulos','modulos_id',"WHERE modulos_table='{$tabela}'");
$modulo = $result[0]['modulos_id'];
$campos = [];

$result = $db->select('tbmodulo_campo','*',"WHERE modulo_campo_modulo_id='{$modulo}'");
$campos[] = "id";
foreach ($result as $row) {
    $campos[] = $row['modulo_campo_nome'];
}

echo json_encode($campos);
?>