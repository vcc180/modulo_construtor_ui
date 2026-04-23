<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", FALSE);
header("Pragma: no-cache");

//carrega todas as configurações
require_once './config.php';

//carrega toda a aplicação
require_once './loader.php';

//Executa
$app = new Application();
$app->run();

?>
