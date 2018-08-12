<?php

require_once("DadosBancario.php");
require_once("CartaoAposta.php");

class Usuario {
	
	private $id;
	private $nome;
	private $cpf;
	private $email;	
	private $senha;	
	private $ativo;
	private $administrador;

	private $dadosBancario;
	private $cartoesAposta;

	function __construct() {
		$this->dadosBancario = new DadosBancario();
		$this->cartoesAposta = [];
	}

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getNome() {
		return $this->nome;
	}

	function setNome($nome) {
		$this->nome = $nome;
	}

	function getCpf() {
		return $this->cpf;
	}

	function setCpf($cpf) {		
		$this->cpf = $cpf;
	}

	function getEmail() {
		return $this->email;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function getSenha() {
		return $this->senha;
	}

	function setSenha($senha) {
		$this->senha = md5($senha);
	}

	function getAtivo() {
		return $this->ativo;
	}

	function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	function getAdministrador() {
		return $this->ativo;
	}

	function setAdministrador($administrador) {
		$this->administrador = $administrador;
	}

	function getDadosBancario() {
		return $this->dadosBancario;
	}

	function setDadosBancario($dadosBancario) {
		$this->dadosBancario = $dadosBancario;
	}

	function getCartoesAposta() {
		return $this->cartoesAposta;
	}

	function setCartoesAposta($cartoesAposta) {
		$this->cartoesAposta = $cartoesAposta;
	}
}

?>
