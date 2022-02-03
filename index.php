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





//chama tela de lista users
$app->get("/admin/usuarios", function () {

 	Usuario::verifyLogin();

 	$users=Usuario::listAll();//chamando todos os usuario


 	$admin= new PageAdmin();

 	$admin->setTlp("usuarios",array("users"=>$users));


});



//chama tela de criar user
$app->get("/admin/usuarios/cadastra_usuario", function () {

	Usuario::verifyLogin();

 	
 	$admin= new PageAdmin();

 	$admin->setTlp("cadastra_usuario");


 	
});



/* coloque sempre as rotas na ordem certa
exemplo: /admin/users/:iduser/delete em cima de /admin/users/:iduser
para ele excutar as rotas certinho, se nao pode achar  q as rotas sao iguais e 
  entender somente a rota /admin/users/:iduser */
  //tela para deletar user
$app->get("/admin/usuarios/:iduser/delete", function ($iduser) {

 	Usuario::verifyLogin();


	$user = new Usuario();

	

	

	
	$user->delete($iduser);

 	header("Location: /admin/usuarios");
 	exit;




});



//chama tela de alterar user
$app->get("/admin/usuarios/:iduser", function ($iduser) {

 	Usuario::verifyLogin();

	$user = new Usuario();

	$user->get((int)$iduser);//convertendo o id passado para int 	

 //	var_dump($user);		
	$admin=new PageAdmin();

 	$admin->setTlp("altera_usuario",array("iduser"=>$user->getIduser(),
 										"desperson"=>$user->getDesperson(),
 										"deslogin"=>$user->getDeslogin(),
 										"despassword"=>$user->getDespassword(),
 										"desemail"=>$user->getDesemail(),
 										"nrphone"=>$user->getNrphone(),
 										"inadmin"=>$user->getInadmin()




 ));


});
/**/



//rota para cadastrar
$app->post("/admin/usuarios/cadastra_usuario", function () {

 	Usuario::verifyLogin();


 		
 	$user = new Usuario();

 	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

 	

 	$user->save($_POST);

 	header("Location: /admin/usuarios");
 	exit;



	/*$user = new User();

 	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

 	$_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

 		"cost"=>12

 	]);

 	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
 	exit;*/


});



//rota para alterar
$app->post("/admin/usuarios/:iduser", function ($iduser) {


 	Usuario::verifyLogin();

	$user = new Usuario();

	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	$user->get((int)$iduser);//convertendo o id passado para int 	

	//var_dump($user);
	$user->update($_POST,$iduser);

 	header("Location: /admin/usuarios");
 	exit;




});






$app->run();//dps dde carregado os arquivos ele roda

 ?>