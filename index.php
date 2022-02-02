<?php 


//iniciando sessao
session_start();
require_once("vendor/autoload.php");


use \felipeno22\DB\Sql;
use \Slim\Slim;
use \felipeno22\Page;
use \felipeno22\PageAdmin;
use \felipeno22\Model\Usuario;



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



$app->get('/admin', function() {
    
   
   


	

	$page=new PageAdmin();

	$page->setTlp("index");

	

});



   $app->post('/',function(){

   		 // chamando o métod de logar da classe User
	Usuario::login($_POST['login'],$_POST['password']);



	//chamando a tela de adminstração após logar
	header("Location: /admin");
	exit;
	




   });






$app->run();//dps dde carregado os arquivos ele roda

 ?>