<?php

require_once("DAO/UsuarioDAO.php");
require_once("Model/Usuario.php");
require_once("Model/DadosBancario.php");

class UsuarioController {

	private $usuarioDAO;

	public function __construct() {
		$this->usuarioDAO = new UsuarioDAO();
	}

	public function cadastrarUsuario($usuario) {
		$usuario->setCpf(str_replace(".", "", $usuario->getCpf()));
		$usuario->setCpf(str_replace("-", "", $usuario->getCpf()));

		if (FALSE) {
			return "Já existe um usuário cadastrado com o CPF: " . $usuario->getCpf();
		}
		if (FALSE) {
			return "Já existe um usuário cadastrado com o Email: " . $usuario->getEmail();
		}

		return $this->usuarioDAO->cadastrarUsuario($usuario);
	}
}

?>