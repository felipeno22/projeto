<?php

namespace felipeno22\Model;
use \felipeno22\DB\Sql;

class Contato{



	private $idcontato;
	private $telefone;
	private $celular;
	private $email;

	
	public function setIdcontato($idcontato){
			$this->idcontato=$idcontato;


	}

	public function getIdcontato(){

		return $this->idcontato;
	}


	public function setTelefone($telefone){
			$this->telefone=$telefone;


	}

	public function getTelefone(){

		return $this->telefone;
	}

	public function setCelular($celular){
			$this->celular=$celular;


	}

	public function getCelular(){

		return $this->celular;
	}

	public function setEmail($email){
			$this->email=$email;


	}

	public function getEmail(){

		return $this->email;
	}



}






?>