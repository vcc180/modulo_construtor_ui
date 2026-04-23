<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* * ******************************************************
 * CONFIGURAÇÕES GERAIS DO SITE.
 * ****************************************************** */
date_default_timezone_set('America/Recife');

ini_set('post_max_size', '10M');
ini_set('upload_max_filesize', '10M');


//CONFIGURAÇÕES BÁSICAS
define('DEBUG', false);
define('MANUTENCAO', false);

define('PATH', dirname(__FILE__)); //DEFINE O CAMINHO RAIZ
define('PATH_LOGS', PATH . '/logs/'); //DEFINE O CAMINHO RAIZ


define('HOME_URI', 'http://localhost/system-generator/'); //DEFINE O LINK RAIZ
define('PATH_IMG_ADM', HOME_URI . 'view/images/'); //DEFINE O CAMINHO PARA A PASTA DE IMAGENS
define('PATH_UPLOADS_IMG', "http://localhost/system-generator/uploads/"); //DEFINE O CAMINHO PARA A PASTA UPLOADS
define('PLUGIN_URI', PATH . "//plugins//"); //DEFINE O CAMINHO PARA A PASTA UPLOADS
define('LIBS_URI', PATH . "//libs//"); //DEFINE O CAMINHO PARA A PASTA UPLOADS

define('URL_UPLOADS', PATH . '\\uploads\\'); //DEFINE O CAMINHO RAIZ
define('PATH_UPLOADS_FILES', PATH . "\\files\\documents\\"); //DEFINE O CAMINHO PARA A PASTA UPLOADS


//CONFIGURAÇÕES DO BANCO DE DADOS
define('DB_HOSTNAME', 'localhost'); //DEFINE O HOSTNAME
define('DB_DATABASE', 'systemgenerator'); //DEFINE O NOME DO BANCO DE DADOS
define('DB_USER', 'root'); //DEFINE O USUÁRIO DE ACESSO AO BANCO DE DADOS
define('DB_PASSWORD', ''); //DEFINE A SENHA DO USUÁRIO DE ACESSO AO BANCO DE DADOS
define('DB_CHARSET', 'UTF8'); //DEFINE O CHARSET DO BANCO

define('EMPRESA_RAZAO_SOCIAL','');
define('EMPRESA_CNPJ','');
define('EMPRESA_ENDERECO','');
define('EMPRESA_TELEFONE','');
define('EMPRESA_EMAIL','');