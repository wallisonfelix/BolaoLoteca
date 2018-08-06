<?php

class Banco {
	
	private $id;	
	private $codigo;
	private $nome;

	function __construct() { }

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getCodigo() {
		retunr $this->codigo;
	}

	function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	function getNome() {
		retunr $this->nome;
	}

	function setNome($nome) {
		$this->nome = $nome;
	}
}

?>
