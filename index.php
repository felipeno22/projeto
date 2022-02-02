<?php 


//iniciando sessao

require_once("vendor/autoload.php");


use \felipeno22\DB\Sql;
use \Slim\Slim;
use \felipeno22\Page;



$app = new Slim();

$app->config('debug', true);


    
   $app->get('/',function(){




   /*	$sql= new Sql();

	$results=$sql->select("select * from tb_users");

	echo json_encode($results);
*/

	$page=new Page();

	$page->setTlp("index");





   });



$app->run();//dps dde carregado os arquivos ele roda

 ?>