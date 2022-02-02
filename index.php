<?php 


//iniciando sessao

require_once("vendor/autoload.php");


use felipeno22\DB\Sql;
use \Slim\Slim;



$app = new Slim();

$app->config('debug', true);


    
   

	$sql= new Sql();

	$results=$sql->select("select * from tb_users");

	echo json_encode($results);


	



$app->run();//dps dde carregado os arquivos ele roda

 ?>