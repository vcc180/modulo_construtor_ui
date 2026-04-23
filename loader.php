<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//CARREGA AS FUNÇÕES GLOBAIS NA MEMÓRIA
require_once PATH . '/global-functions.php';

//INICA SESSÃO
session_cache_expire(1);
$cache_expire = session_cache_expire();

session_start();
//ob_start();

//SE O MODO DE VISUALIZAÇÃO DEBUG ESTIVER ATIVO
if(!defined('DEBUG') || DEBUG ===TRUE){
    //MOSTRA TODOS OS ERROS
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}else{
    //OCULTA TODOS OS ERROS
    error_reporting(0);
    ini_set('display_errors',0);
}