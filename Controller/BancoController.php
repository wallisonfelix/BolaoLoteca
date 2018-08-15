<?php

require_once(".././DAO/BancoDAO.php");
require_once(".././Model/Banco.php");

class BancoController {

	private $bancoDAO;

	public function __construct() {
		$this->bancoDAO = new BancoDAO();
	}

	public function cadastrarBanco($banco) {
		$mensagensErro = $this->validarDadosBanco($banco);
		if (empty($mensagensErro)) {
			return $this->bancoDAO->cadastrarBanco($banco);
		} else {
			return false;
		}	
	}

	public function editarBanco($banco) {
		if ($banco->getId() > 0) {
			$mensagensErro = $this->validarDadosBanco($banco);
			if (empty($mensagensErro)) {
				return $this->bancoDAO->editarBanco($banco);
			} else {
				return false;
			}		
		} else {
			return false;
		}
	}

	public function listarBanco($banco) {
		if ($banco != null) {
			return $this->bancoDAO->listarBanco($banco);
		} else {
			return array();
		}		
	}

	public function obterBancoPorId(int $idBanco) {
		if ($idBanco > 0) {
			return $this->bancoDAO->obterBancoPorId($idBanco);
		} else {
			return null;
		}
	}

	private function validarDadosBanco($banco) {
		$mensagensErro = [];

		$qntBancoPorCodigo = $this->bancoDAO->quantidadeOutrosBancosPorCodigo($banco->getId(), $banco->getCodigo());
		if ($qntBancoPorCodigo != 0) {
			$mensagensErro[] = "Já existe um Banco cadastrado com este código";		
		}

		return $mensagensErro;
	}
}

?>