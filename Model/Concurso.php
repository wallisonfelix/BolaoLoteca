<?php

require_once("PossibilidadeAposta.php");
require_once("Jogo.php");
require_once("CartaoAposta.php");

class Concurso {
	
	private $id;
	private $codigo;
	private $dataInicio;
	private $dataFim;
	private $cartaoApostaFinal;
	private $ativo;

	private $possibilidadeAposta;	
	private $jogos;
	private $cartoesAposta;

	function __construct() {
		$this->possibilidadeAposta = new PossibilidadeAposta();
		$this->jogos = [];
		$this->cartoesAposta = [];		
	}

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

	function getDataInicio() {
		return $this->dataInicio;
	}

	function setDataInicio($dataInicio) {
		$this->dataInicio = $dataInicio;
	}

	function getDataFim() {
		return $this->dataFim;
	}

	function setDataFim($dataFim) {
		$this->dataFim = $dataFim;
	}

	function getCartaoApostaFinal() {
		return $this->cartaoApostaFinal;
	}

	function setCartaoApostaFinal($cartaoApostaFinal) {
		$this->cartaoApostaFinal = $cartaoApostaFinal;
	}	

	function getAtivo() {
		return $this->ativo;
	}

	function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	function getPossibilidadeAposta() {
		return $this->possibilidadeAposta;
	}

	function setPossibilidadeAposta($possibilidadeAposta) {
		$this->possibilidadeAposta = $possibilidadeAposta;
	}

	function getJogos() {
		return $this->jogos;
	}

	function setJogos($jogos) {
		$this->jogos = $jogos;
	}

	function getCartoesAposta() {
		return $this->cartoesAposta;
	}

	function setCartoesAposta($cartoesAposta) {
		$this->cartoesAposta = $cartoesAposta;
	}
}

?>
