<?php

use \felipeno22\PageAdmin;
use \felipeno22\Model\Usuario;


$app->get('/admin', function() {
    
   
   
		//verificando sessao do login
    Usuario:: verifyLogin();

	

	$page=new PageAdmin();

	$page->setTlp("index");

	

});

//criando rota para a tela de  login
$app->get('/admin/login', function() {
    
	//echo "OK";

	//quando for a rota da tela de login header e footer da pagina é difente
	//entao passa os parametros como false para nao chamar os header e footer
	//que são padrões nas demais páginas
	$page=new PageAdmin(["header"=>false,"footer"=>false]);

	$page->setTlp("login");

	

});


//criando rota para a tela de  login
$app->post('/admin/login', function() {
    

    // chamando o métod de logar da classe User
	Usuario::login($_POST['login'],$_POST['password']);



	//chamando a tela de adminstração após logar
	header("Location: /admin");
	exit;
	

});


//criando rota para a tela de  login
$app->get('/admin/logout', function() {
    

   Usuario::logout();


	//chamando a tela de adminstração após logar
	header("Location: /admin/login");
	exit;
	

});




?>