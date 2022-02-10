<?php

use \felipeno22\PageAdmin;
use \felipeno22\Model\Cliente;
use \felipeno22\Model\Usuario;



//chama tela de lista users
$app->get("/admin/clientes", function () {

 	Usuario::verifyLogin();

 	$clientes=Cliente::listAll();//chamando todos os clientes



 	$admin= new PageAdmin();

 	$admin->setTlp("clientes",array("clientes"=>$clientes));


});



//chama tela de criar user
$app->get("/admin/clientes/create", function () {



/*
$clientes=new Cliente();


$array_clientes=["nome"=>"Felipe2","idade"=>"29","dataNascimento"=>"1993-08-03",
"rua"=>"rua alvarez3","bairro"=>" tocone3","numero"=>"444","cep"=>"706996","cidade"=>"Campo Grande","estado"=>"MS",
"telefone"=>"44454044","celular"=>"981236789","email"=>"felipenomarques3@outlook.pt"];

$clientes->save($array_clientes);
*/
 	
 	$admin= new PageAdmin();

 	$admin->setTlp("users-create");


 	
});



//chama tela de cadastrar clientes
$app->get("/admin/clientes/cadastra_cliente", function () {

	Usuario::verifyLogin();

 	
 	$admin= new PageAdmin();

 	$admin->setTlp("cadastra_cliente");


 	
});



$app->get("/admin/clientes/:idcliente/delete", function ($idcliente) {

 	Usuario::verifyLogin();


	$clientes = new Cliente();

	

	

	
	$clientes->delete($idcliente);

 	header("Location: /admin/clientes");
 	exit;




});




//chama tela de alterar cliente
$app->get("/admin/clientes/:idcliente", function ($idcliente) {

 	Usuario::verifyLogin();

	$clientes = new Cliente();

	$clientes->get((int)$idcliente);//convertendo o id passado para int 	

 //	var_dump($user);		
	$admin=new PageAdmin();

 	$admin->setTlp("altera_cliente",array("idcliente"=>$clientes->getIdcliente(),
 										"nome"=>$clientes->getNome(),
 										"idade"=>$clientes->getIdade(),
 										"dataNascimento"=>$clientes->getDataNascimento(),
 										"rua"=>$clientes->getRua(),
 										"bairro"=>$clientes->getBairro(),
 										"numero"=>$clientes->getNumero(),
 										"cep"=>$clientes->getCep(),
 										"cidade"=>$clientes->getCidade(),
 										"estado"=>$clientes->getEstado(),
 										"telefone"=>$clientes->getTelefone(),
 										"celular"=>$clientes->getCelular(),
 										"email"=>$clientes->getEmail()));


});




//rota para cadastrar
$app->post("/admin/clientes/cadastra_cliente", function () {

 	Usuario::verifyLogin();


 		
 	$clientes = new Cliente();

 	

 	$clientes->save($_POST);

 	header("Location: /admin/clientes");
 	exit;




});



//rota para alterar
$app->post("/admin/clientes/:idcliente", function ($idcliente) {


 	Usuario::verifyLogin();

	$clientes = new Cliente();

	$clientes->get((int)$idcliente);//convertendo o id passado para int 	

	//var_dump($user);
	$clientes->update($_POST,$idcliente);

 	header("Location: /admin/clientes");
 	exit;




});









?>