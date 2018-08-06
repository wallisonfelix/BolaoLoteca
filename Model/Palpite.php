<?php

require_once("CartaoAposta.php");
require_once("Jogo.php");
require_once("OpcaoPalpite.php");

class Palpite {
	
	private $id;	
	private $dataHora;
	private $ativo;	
	private $tipoAposta;
	
	private $cartaoAposta;
	private $jogo;
	private $resultados;	

	function __construct() {
		$this->cartaoAposta = new CartaoAposta();
		$this->jogo = new Jogo();
		$this->resultados = [];
	}

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getDataHora() {
		retunr $this->dataHora;
	}

	function setDataHora($dataHora) {
		$this->dataHora = $dataHora;
	}

	function getAtivo() {
		retunr $this->ativo;
	}

	function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	function getTipoAposta() {
		retunr $this->tipoAposta;
	}

	function setTipoAposta($tipoAposta) {
		$this->tipoAposta = $tipoAposta;
	}

	function getCartaoAposta() {
		retunr $this->cartaoAposta;
	}

	function setCartaoAposta($cartaoAposta) {
		$this->cartaoAposta = $cartaoAposta;
	}

	function getJogo() {
		retunr $this->jogo;
	}

	function setJogo($jogo) {
		$this->jogo = $jogo;
	}

	function getResultados() {
		retunr $this->resultados;
	}

	function setResultados($resultados) {
		$this->resultados = $resultados;
	}
}

?>
