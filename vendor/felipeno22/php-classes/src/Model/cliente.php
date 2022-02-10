<?php

namespace felipeno22\Model;
use \felipeno22\DB\Sql;

class Cliente extends Endereco{



	private $idcliente;
	private $nome;
	private $idade;
	private $dataNascimento;
	
	public function setIdcliente($idcliente){
			$this->idcliente=$idcliente;


	}

	public function getIdcliente(){

		return $this->idcliente;
	}


	public function setNome($nome){
			$this->nome=$nome;


	}

	public function getNome(){

		return $this->nome;
	}

	public function setIdade($idade){
			$this->idade=$idade;


	}

	public function getIdade(){

		return $this->idade;
	}

	public function setDataNascimento($dataNascimento){
			$this->dataNascimento=$dataNascimento;


	}

	public function getDataNascimento(){

		return $this->dataNascimento;
	}


public static function listAll(){

	$sql=new Sql();
	
	

	

return $sql->select("
SELECT *,DATE_FORMAT(c.dataNascimento, '%d/%m/%Y') as dt FROM clientes c 
inner join enderecos e  on e.idcliente=c.idcliente
inner join contatos cont on cont.idcliente=c.idcliente");


}


//para salvar user usando procedure	
public  function save($dados){

	
	
	
	$this->setNome($dados["nome"]);
	$this->setIdade($dados["idade"]);
	$this->setDataNascimento($dados["dataNascimento"]);
	$this->setRua($dados["rua"]);
	$this->setBairro($dados["bairro"]);
	$this->setNumero($dados["numero"]);
	$this->setCep($dados["cep"]);
	$this->setCidade($dados["cidade"]);
	$this->setEstado($dados["estado"]);
	$this->setTelefone($dados["telefone"]);
	$this->setCelular($dados["celular"]);
	$this->setEmail($dados["email"]);

	


	$sql=new Sql();

	$result=$sql->query("call sp_clienteEnderecoContato_save(
:pidcliente,
:pnome ,
:pidade ,
:pdataNascimento,
:prua ,
:pbairro ,
:pnumero ,
:pcep ,
:pcidade ,
:pestado ,
:ptelefone ,
:pcelular ,
:pemail )",array(":pidcliente"=>$this->getIdcliente(),
			":pnome"=>$this->getNome(),
			":pidade"=>$this->getIdade(),
			":pdataNascimento"=>$this->getDataNascimento(),
			":prua"=>$this->getRua(),
			":pbairro"=>$this->getBairro(),
			":pnumero"=>$this->getNumero(),
			":pcep"=>$this->getCep(),
			":pcidade"=>$this->getCidade(),
			":pestado"=>$this->getEstado(),
			":ptelefone"=>$this->getTelefone(),
			":pcelular"=>$this->getCelular(),
			":pemail"=>$this->getEmail()


		));
	
			 

	}



//reponsavel por pegar os dados atraves do id do user
	public  function get($idcliente){

	$sql=new Sql();

$result=$sql->select("SELECT * FROM clientes c 
inner join enderecos e  on e.idcliente=c.idcliente
inner join contatos cont on cont.idcliente=c.idcliente where c.idcliente= :idcliente ",array("idcliente"=>$idcliente));

		
	$this->setIdcliente($result[0]["idcliente"]);	
	$this->setNome($result[0]["nome"]);
	$this->setIdade($result[0]["idade"]);
	$this->setDataNascimento($result[0]["dataNascimento"]);
	$this->setRua($result[0]["rua"]);
	$this->setBairro($result[0]["bairro"]);
	$this->setNumero($result[0]["numero"]);
	$this->setCep($result[0]["cep"]);
	$this->setCidade($result[0]["cidade"]);
	$this->setEstado($result[0]["estado"]);
	$this->setTelefone($result[0]["telefone"]);
	$this->setCelular($result[0]["celular"]);
	$this->setEmail($result[0]["email"]);


	
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




public  function update($dados,$idcliente){

	
	$this->setIdcliente($idcliente);
	$this->setNome($dados["nome"]);
	$this->setIdade($dados["idade"]);
	$this->setDataNascimento($dados["dataNascimento"]);
	$this->setRua($dados["rua"]);
	$this->setBairro($dados["bairro"]);
	$this->setNumero($dados["numero"]);
	$this->setCep($dados["cep"]);
	$this->setCidade($dados["cidade"]);
	$this->setEstado($dados["estado"]);
	$this->setTelefone($dados["telefone"]);
	$this->setCelular($dados["celular"]);
	$this->setEmail($dados["email"]);


		$sql=new Sql();

	$result=$sql->query("call sp_clienteEnderecoContato_save(
:pidcliente,
:pnome ,
:pidade ,
:pdataNascimento,
:prua ,
:pbairro ,
:pnumero ,
:pcep ,
:pcidade ,
:pestado ,
:ptelefone ,
:pcelular ,
:pemail )",array(":pidcliente"=>$this->getIdcliente(),
			":pnome"=>$this->getNome(),
			":pidade"=>$this->getIdade(),
			":pdataNascimento"=>$this->getDataNascimento(),
			":prua"=>$this->getRua(),
			":pbairro"=>$this->getBairro(),
			":pnumero"=>$this->getNumero(),
			":pcep"=>$this->getCep(),
			":pcidade"=>$this->getCidade(),
			":pestado"=>$this->getEstado(),
			":ptelefone"=>$this->getTelefone(),
			":pcelular"=>$this->getCelular(),
			":pemail"=>$this->getEmail()


		));
	
	
	

	}



public  function delete($idcliente){

	
	$sql=new Sql();

	$result=$sql->select("call sp_clientes_delete(
		:idcliente)",array(":idcliente"=>$idcliente));
	
	

	}





}






?>