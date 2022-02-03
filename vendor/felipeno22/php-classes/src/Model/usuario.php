<?php

namespace felipeno22\Model;
use \felipeno22\DB\Sql;

class Usuario{

	const SESSION="Usuario";

	private $iduser;
	private $idperson;
	private $desperson;
	private $deslogin;
	private $despassword;
	private $desemail;
	private $nrphone;
	private $inadmin;

	public function setIduser($iduser){
			$this->iduser=$iduser;


	}

	public function getIduser(){

		return $this->iduser;
	}


	public function setIdperson($idperson){
			$this->idperson=$idperson;


	}

	public function getIdperson(){

		return $this->idperson;
	}

	public function setDesperson($desperson){
			$this->desperson=$desperson;


	}

	public function getDesperson(){

		return $this->desperson;
	}

	public function setDeslogin($deslogin){
			$this->deslogin=$deslogin;


	}

	public function getDeslogin(){

		return $this->deslogin;
	}

	public function setDespassword($despassword){
			$this->despassword=$despassword;


	}

	public function getDespassword(){

		return $this->despassword;
	}

	public function setDesemail($desemail){
			$this->desemail=$desemail;


	}

	public function getDesemail(){

		return $this->desemail;
	}

	public function setNrphone($nrphone){
			$this->nrphone=$nrphone;


	}

	public function getNrphone(){

		return $this->nrphone;
	}


	public function setInadmin($inadmin){
			$this->inadmin=$inadmin;

	}

public function getInadmin(){

	return $this->inadmin;
}



	public  static function login($login,$password){

			$sql=new Sql();


			$result=$sql->select("select * from tb_users where deslogin= :LOGIN",array(":LOGIN"=>$login));

			if(count($result)===0){
				//criando uma exception 
				//Para criar use \  no Exception pois o namespace  Hcode\Model não possui exception
				throw new \Exception ("Usuário inexistente ou  senha inválida!"); 
			}

			//se existir resultado da consulta procegue
			$data=$result[0];

				//var_dump($data);

			/*	array(6) { ["iduser"]=> string(1) "5" ["idperson"]=> string(1) "2" ["deslogin"]=> string(5) "admin" ["despassword "]=> string(32) "21232f297a57a5a743894a0e4a801fc3" ["inadmin"]=> string(1) "1" ["dtregister"]=> string(19) "2022-01-31 15:06:57" }*/


		// verifica se o segundo parametro é igual o primeiro e retorna true or false	
		//password_verify($password, $data['password']);

			//echo md5($password);
			//echo "</br>";
			//echo $data['despassword'];
			//echo "</br>";
			
			if(md5($password)===$data['despassword']){
			

				$user= new Usuario();

					$user->setIdUser($data['iduser']);
					$user->setIdperson($data['idperson']);
					$user->setDeslogin($data['deslogin']);
					$user->setDespassword($data['despassword']);
					$user->setInadmin($data['inadmin']);

					$array_user=[

						"iduser"=> $user->getIdUser(),
						"idperson"=> $user->getIdperson(),
						"deslogin"=> $user->getDeslogin(),
						"despassword"=> $user->getDespassword(),
						"inadmin"=> $user->getInadmin(),

					];

					$_SESSION[Usuario::SESSION]=$array_user;

						/*echo $user->getIdUser();
						echo "<br>";

						echo $user->getIdUser();
						echo "<br>";

						echo $user->getIdperson();
						echo "<br>";


						echo $user->getDeslogin();
						echo "<br>";


						echo $user->getDespassword();
						echo "<br>";

						echo $user->getInadmin();
						echo "<br>";*/

						//	var_dump($user);
						return $user;


			}else{


				throw new \Exception ("Usuário inexistente ou  senha inválida!"); 
			}

			 
		
			


	}


		public static function verifyLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[Usuario::SESSION])
			|| 
			!$_SESSION[Usuario::SESSION]
			||
			!(int)$_SESSION[Usuario::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[Usuario::SESSION]["iduser"] !== $inadmin
		) {
			
			header("Location: /admin/login");
			exit;

		}

	}



public static function logout()
	{

		$_SESSION[Usuario::SESSION] = NULL;

	}

public static function listAll(){

	$sql=new Sql();
	
	

	

return $sql->select('
SELECT * FROM tb_users u
inner join tb_persons p 
on p.idperson=u.idperson  order by u.idperson;
 ');


}


//para salvar user usando procedure	
public  function save($dados){

	
//	var_dump($dados);

	/*array(5) { ["desperson"]=> string(22) "Adrieli Ornela Barbosa" ["deslogin"]=> string(3) "ddd" ["nrphone"]=> string(11) "67984016117" ["desemail"]=> string(23) "ornelaadrieli@gmail.com" ["inadmin" ]=> int(1) }*/

	
	$this->setDesperson($dados["desperson"]);
	$this->setDespassword($dados["despassword"]);
	$this->setDeslogin($dados["deslogin"]);
	$this->setNrphone($dados["nrphone"]);
	$this->setDesemail($dados["desemail"]);
	$this->setInadmin($dados["inadmin"]);


		/*echo $this->getDeslogin();
		echo "<br>";
		echo $this->getDespassword();
		echo "<br>";
		echo $this->getDesemail();
		echo "<br>";
	     echo $this->getNrphone();
	     echo "<br>";
		echo $this->getInadmin();
		echo "<br>";
*/

	$sql=new Sql();

	$sql->select("call sp_users_save(
		:desperson, 
		:deslogin, 
		:despassword, 
		:desemail, 
		:nrphone, 
		:inadmin)",array(":desperson"=>$this->getDesperson(),
			":deslogin"=>$this->getDeslogin(),
			":despassword"=>$this->getDespassword(),
			":desemail"=>$this->getDesemail(),
			":nrphone"=>$this->getNrphone(),
			":inadmin"=>$this->getInadmin()));
	
	

	}



//reponsavel por pegar os dados atraves do id do user
	public  function get($iduser){

	$sql=new Sql();

$result=$sql->select('SELECT * FROM tb_users u
inner join tb_persons p 
on p.idperson=u.idperson  where u.iduser= :iduser',array("iduser"=>$iduser));

		
	
	$this->setIduser($result[0]["iduser"]);
	$this->setIdperson($result[0]["idperson"]);
	$this->setDesperson($result[0]["desperson"]);
	$this->setDespassword($result[0]["despassword"]);
	$this->setDeslogin($result[0]["deslogin"]);
	$this->setNrphone($result[0]["nrphone"]);
	$this->setDesemail($result[0]["desemail"]);
	$this->setInadmin($result[0]["inadmin"]);


		




		/*echo $this->getIdperson();
		echo "<br>";
		echo $this->getDeslogin();
		echo "<br>";
		echo $this->getDespassword();
		echo "<br>";
		echo $this->getDesemail();
		echo "<br>";
	     echo $this->getNrphone();
	     echo "<br>";
		echo $this->getInadmin();
		echo "<br>";
*/


	 

	}



public  function update($dados,$iduser){

	
	//var_dump($dados);
	//echo $iduser;

	/*array(5) { ["desperson"]=> string(22) "Adrieli Ornela Barbosa" ["deslogin"]=> string(3) "ddd" ["nrphone"]=> string(11) "67984016117" ["desemail"]=> string(23) "ornelaadrieli@gmail.com" ["inadmin" ]=> int(1) }*/

	$this->setIduser($iduser);
	$this->setDesperson($dados["desperson"]);
	$this->setDeslogin($dados["deslogin"]);
	$this->setNrphone($dados["nrphone"]);
	$this->setDesemail($dados["desemail"]);
	$this->setInadmin($dados["inadmin"]);


		/*echo $this->getDeslogin();
		echo "<br>";
		echo $this->getDespassword();
		echo "<br>";
		echo $this->getDesemail();
		echo "<br>";
	     echo $this->getNrphone();
	     echo "<br>";
		echo $this->getInadmin();
		echo "<br>";
*/

	$sql=new Sql();

	$result=$sql->select("call sp_usersupdate_save(
		:iduser,
		:desperson, 
		:deslogin, 
		:despassword, 
		:desemail, 
		:nrphone, 
		:inadmin)",array(":iduser"=>$this->getIduser(),
			":desperson"=>$this->getDesperson(),
			":deslogin"=>$this->getDeslogin(),
			":despassword"=>$this->getDespassword(),
			":desemail"=>$this->getDesemail(),
			":nrphone"=>$this->getNrphone(),
			":inadmin"=>$this->getInadmin()));
	
	

	}



public  function delete($iduser){

	
	$sql=new Sql();

	$result=$sql->select("call sp_users_delete(
		:iduser)",array(":iduser"=>$iduser));
	
	

	}





}






?>