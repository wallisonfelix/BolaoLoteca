<?php

require_once(".././DAO/BancoDAO.php");
require_once(".././Model/Banco.php");

class BancoController {

	private $bancoDAO;

	public function __construct() {
		$this->bancoDAO = new BancoDAO();
	}

	public function cadastrarBanco($banco) {
		/*$usuario->setCpf(str_replace(".", "", $usuario->getCpf()));
		$usuario->setCpf(str_replace("-", "", $usuario->getCpf()));

		if (FALSE) {
			return "Já existe um usuário cadastrado com o CPF: " . $usuario->getCpf();
		}
		if (FALSE) {
			return "Já existe um usuário cadastrado com o Email: " . $usuario->getEmail();
		}

		return $this->usuarioDAO->cadastrarUsuario($usuario);*/
	}

	public function listarBanco($banco) {
		return $this->bancoDAO->listarBanco($banco);
	}
}

?>