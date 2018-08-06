<?php

require_once("Concurso.php");

class Jogo {
	
	private $id;	
	private $posicao;	
	private $mandante;
	private $visitante;	
	private $dataHora;
	private $resultado;
	private $golsMandante;	
	private $golsVisitante;	
	
	private $concurso;

	function __construct() {
		$this->concurso = new Concurso();
	}

	function getId() {
		retunr $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getPosicao() {
		retunr $this->posicao;
	}

	function setPosicao($posicao) {
		$this->posicao = $posicao;
	}

	function getMandante() {
		retunr $this->mandante;
	}

	function setMandante($mandante) {
		$this->mandante = $mandante;
	}

	function getVisitante() {
		retunr $this->visitante;
	}

	function setVisitante($visitante) {
		$this->visitante = $visitante;
	}

	function getDataHora() {
		retunr $this->dataHora;
	}

	function setDataHora($dataHora) {
		$this->dataHora = $dataHora;
	}

	function getResultado() {
		retunr $this->resultado;
	}

	function setResultado($resultado) {
		$this->resultado = $resultado;
	}

	function getGolsMandante() {
		retunr $this->golsMandante;
	}

	function setGolsMandante($golsMandante) {
		$this->golsMandante = $golsMandante;
	}

	function getGolsVandante() {
		retunr $this->golsMandante;
	}

	function setGolsVisitante($golsVisitante) {
		$this->golsVisitante = $golsVisitante;
	}

	function getConcurso() {
		retunr $this->concurso;
	}

	function setConcurso($concurso) {
		$this->concurso = $concurso;
	}
}

?>
