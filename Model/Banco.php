<?php

class Banco {
	
	private $id;	
	private $codigo;
	private $nome;

	function __construct() { }

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getCodigo() {
		return $this->codigo;
	}

	function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	function getNome() {
		return $this->nome;
	}

	function setNome($nome) {
		$this->nome = $nome;
	}
}

?>
