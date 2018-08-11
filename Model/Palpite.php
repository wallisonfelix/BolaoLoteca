<?php

require_once("CartaoAposta.php");
require_once("Jogo.php");
require_once("OpcaoPalpite.php");

class Palpite {
	
	private $id;	
	private $dataHora;
	private $ativo;	
	
	private $tipoPalpite;
	private $cartaoAposta;
	private $jogo;
	private $resultados;	

	function __construct() {
		$this->cartaoAposta = new CartaoAposta();
		$this->jogo = new Jogo();
		$this->resultados = [];
	}

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getDataHora() {
		return $this->dataHora;
	}

	function setDataHora($dataHora) {
		$this->dataHora = $dataHora;
	}

	function getAtivo() {
		return $this->ativo;
	}

	function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	function getTipoPalpite() {
		return $this->tipoPalpite;
	}

	function setTipoPalpite($tipoPalpite) {
		$this->tipoPalpite = $tipoPalpite;
	}

	function getCartaoAposta() {
		return $this->cartaoAposta;
	}

	function setCartaoAposta($cartaoAposta) {
		$this->cartaoAposta = $cartaoAposta;
	}

	function getJogo() {
		return $this->jogo;
	}

	function setJogo($jogo) {
		$this->jogo = $jogo;
	}

	function getResultados() {
		return $this->resultados;
	}

	function setResultados($resultados) {
		$this->resultados = $resultados;
	}
}

?>
