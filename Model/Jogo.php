<?php

require_once("Concurso.php");

class Jogo {
	
	private $id;	
	private $posicao;	
	private $mandante;
	private $visitante;	
	private $dataHora;
	private $golsMandante;	
	private $golsVisitante;
		
	private $resultado;
	private $concurso;

	function __construct() {
		$this->concurso = new Concurso();
	}

	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getPosicao() {
		return $this->posicao;
	}

	function setPosicao($posicao) {
		$this->posicao = $posicao;
	}

	function getMandante() {
		return $this->mandante;
	}

	function setMandante($mandante) {
		$this->mandante = $mandante;
	}

	function getVisitante() {
		return $this->visitante;
	}

	function setVisitante($visitante) {
		$this->visitante = $visitante;
	}

	function getDataHora() {
		return $this->dataHora;
	}

	function setDataHora($dataHora) {
		$this->dataHora = $dataHora;
	}	

	function getGolsMandante() {
		return $this->golsMandante;
	}

	function setGolsMandante($golsMandante) {
		$this->golsMandante = $golsMandante;
	}

	function getGolsVandante() {
		return $this->golsMandante;
	}

	function setGolsVisitante($golsVisitante) {
		$this->golsVisitante = $golsVisitante;
	}

	function getResultado() {
		return $this->resultado;
	}

	function setResultado($resultado) {
		$this->resultado = $resultado;
	}

	function getConcurso() {
		return $this->concurso;
	}

	function setConcurso($concurso) {
		$this->concurso = $concurso;
	}
}

?>
