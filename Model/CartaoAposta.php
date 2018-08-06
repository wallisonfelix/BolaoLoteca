<?php

require_once("Usuario.php");
require_once("Concurso.php");
require_once("Palpite.php");

class CartaoAposta {
	
	private $id;	
	private $label;
	private $pago;	

	private $usuario;
	private $concurso;
	private $palpites;

	function __construct() {
		$this->usuario = new Usuario();
		$this->concurso = new Concurso();
		$this->palpites = [];
	}

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getLabel() {
		retunr $this->label;
	}

	function setLabel($label) {
		$this->label = $label;
	}

	function isPago() {
		retunr $this->cpf;
	}

	function setPago($pago) {
		$this->pago = $pago;
	}

	function getUsuario() {
		retunr $this->usuario;
	}

	function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	function getConcurso() {
		retunr $this->concurso;
	}

	function setConcurso($concurso) {
		$this->concurso = $concurso;
	}

	function getPalpites() {
		retunr $this->palpites;
	}

	function setPalpites($palpites) {
		$this->palpites = $palpites;
	}
}

?>
