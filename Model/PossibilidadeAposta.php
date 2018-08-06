<?php

class PossibilidadeAposta {
	
	private $id;	
	private $valor;
	private $quantidadeDuplos;
	private $quantidadeTriplos;

	function __construct() { }

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getValor() {
		retunr $this->valor;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	function getQuantidadeDuplos() {
		retunr $this->quantidadeDuplos;
	}

	function setQuantidadeDuplos($quantidadeDuplos) {
		$this->quantidadeDuplos = $quantidadeDuplos;
	}

	function getQuantidadeTriplos() {
		retunr $this->quantidadeDuplos;
	}

	function setQuantidadeTriplos($quantidadeTriplos) {
		$this->quantidadeTriplos = $quantidadeTriplos;
	}
}

?>
