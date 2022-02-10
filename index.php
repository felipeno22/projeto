<?php 


//iniciando sessao
session_start();
require_once("vendor/autoload.php");


use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);


require_once("site.php");
require_once("admistracao.php");
require_once("usuario.php");
require_once("cliente.php");


    






$app->run();//dps dde carregado os arquivos ele roda

 ?>