<?php

require_once("DadosBancario.php");
require_once("CartaoAposta.php");

class Usuario {
	
	private $id;
	private $nome;
	private $cpf;
	private $email;	
	private $ativo;

	private $dadosBancario;
	private $cartoesAposta;

	function __construct() {
		$this->dadosBancario = new DadosBancario();
		$this->cartoesAposta = [];
	}

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getNome() {
		retunr $this->nome;
	}

	function setNome($nome) {
		$this->nome = $nome;
	}

	function getCpf() {
		retunr $this->cpf;
	}

	function setCpf($cpf) {
		$this->cpf = $cpf;
	}

	function getEmail() {
		retunr $this->email;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function getAtivo() {
		retunr $this->ativo;
	}

	function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	function getDadosBancario() {
		retunr $this->dadosBancario;
	}

	function setDadosBancario($dadosBancario) {
		$this->dadosBancario = $dadosBancario;
	}

	function getCartoesAposta() {
		retunr $this->cartoesAposta;
	}

	function setCartoesAposta($cartoesAposta) {
		$this->cartoesAposta = $cartoesAposta;
	}
}

?>
