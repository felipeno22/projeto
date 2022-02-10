<?php

namespace felipeno22\Model;
use \felipeno22\DB\Sql;

class Endereco extends Contato{



	private $idendereco;
	private $rua;
	private $bairro;
	private $numero;
	private $cep;
	private $cidade;
	private $estado;

	
	public function setIdendereco($idendereco){
			$this->idendereco=$idendereco;


	}

	public function getIdendereco(){

		return $this->idendereco;
	}


	public function setRua($rua){
			$this->rua=$rua;


	}

	public function getRua(){

		return $this->rua;
	}



	public function setBairro($bairro){
			$this->bairro=$bairro;


	}

	public function getBairro(){

		return $this->bairro;
	}




	public function setNumero($numero){
			$this->numero=$numero;


	}

	public function getNumero(){

		return $this->numero;
	}

	
	public function setCep($cep){
			$this->cep=$cep;


	}

	public function getCep(){

		return $this->cep;
	}


	public function setCidade($cidade){
			$this->cidade=$cidade;


	}

		public function getCidade(){

		return $this->cidade;
	}


	public function setEstado($estado){
			$this->estado=$estado;


	}

		public function getEstado(){

		return $this->estado;
	}







}






?>