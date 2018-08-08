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

	function getDataInicio() {
		retunr $this->dataInicio;
	}

	function setDataInicio($dataInicio) {
		$this->dataInicio = $dataInicio;
	}

	function getDataFim() {
		retunr $this->dataFim;
	}

	function setDataFim($dataFim) {
		$this->dataFim = $dataFim;
	}

	function getCartaoApostaFinal() {
		retunr $this->cartaoApostaFinal;
	}

	function setCartaoApostaFinal($cartaoApostaFinal) {
		$this->cartaoApostaFinal = $cartaoApostaFinal;
	}	

	function getAtivo() {
		retunr $this->ativo;
	}

	function setAtivo($ativo) {
		$this->ativo = $ativo;
	}

	function getPossibilidadeAposta() {
		retunr $this->possibilidadeAposta;
	}

	function setPossibilidadeAposta($possibilidadeAposta) {
		$this->possibilidadeAposta = $possibilidadeAposta;
	}

	function getJogos() {
		retunr $this->jogos;
	}

	function setJogos($jogos) {
		$this->jogos = $jogos;
	}

	function getCartoesAposta() {
		retunr $this->cartoesAposta;
	}

	function setCartoesAposta($cartoesAposta) {
		$this->cartoesAposta = $cartoesAposta;
	}
}

?>
