<?php

class PossibilidadeAposta {
	
	private $id;	
	private $valor;
	private $quantidadeDuplos;
	private $quantidadeTriplos;

	function __construct() { }

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getValor() {
		return $this->valor;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	function getQuantidadeDuplos() {
		return $this->quantidadeDuplos;
	}

	function setQuantidadeDuplos($quantidadeDuplos) {
		$this->quantidadeDuplos = $quantidadeDuplos;
	}

	function getQuantidadeTriplos() {
		return $this->quantidadeDuplos;
	}

	function setQuantidadeTriplos($quantidadeTriplos) {
		$this->quantidadeTriplos = $quantidadeTriplos;
	}
}

?>
