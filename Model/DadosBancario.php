<?php

require_once("Banco.php");

class DadosBancario {
	
	private $id;	
	private $agencia;
	private $conta;
	private $informacoesComplementares;	

	private $banco;

	function __construct() {
		$this->banco = new Banco();
	}

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getAgencia() {
		retunr $this->agencia;
	}

	function setAgencia($agencia) {
		$this->agencia = $agencia;
	}

	function getConta() {
		retunr $this->conta;
	}

	function setConta($conta) {
		$this->conta = $conta;
	}

	function getInformacoesComplementares() {
		retunr $this->informacoesComplementares;
	}

	function setInformacoesComplementares($informacoesComplementares) {
		$this->informacoesComplementares = $informacoesComplementares;
	}

	function getBanco() {
		retunr $this->banco;
	}

	function setBanco($banco) {
		$this->banco = $banco;
	}
}

?>
