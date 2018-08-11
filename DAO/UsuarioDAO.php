<?php

require_once("DataBase.php");
require_once(".././Model/Usuario.php");
require_once(".././Model/DadosBancario.php");

class UsuarioDAO {

	private static $usuarioSequence = "cadastros.usuario_sequence";
	private static $dadosBancarioSequence = "cadastros.dados_bancario_sequence";
	
	private $pdo;

	public function __construct() {
		$this->pdo = new DataBase();
	}

	public function cadastrarDadosBancario($dadosBancario) {
		$sql = "INSERT INTO cadastros.dados_bancario(id, agencia, conta, informacoes_complementares, id_banco)"
    				. " VALUES (:id, :agencia, :conta, :informacoes_complementares, :id_banco);"
    	$params = array(
    		':id' => $this->pdo->NextValSequence($dadosBancarioSequence),
    		':agencia' => $dadosBancario->getAgencia();
    		':conta' => $dadosBancario->getConta();
    		':informacoes_complementares' => $dadosBancario->getInformacoesComplementares(),
    		':id_banco' => $dadosBancario->getBanco()->getId()
    	);

    	return $this->pdo->ExecuteNonQuery($sql, $params);			
	}

	public function cadastrarUsuario($usuario) {
		$this->pdo->BeginTransaction();

		$resultadoCadastroDadosBancario = $this->cadastrarDadosBancario($usuario->getDadosBancario());
		if (!$resultadoCadastroDadosBancario) {
			die("Erro ao cadastrar os Dados Bancários do Usuário.");
		}

		$sql = "INSERT INTO cadastros.usuario(id, nome, cpf, email, senha, ativo, id_dados_bancario)"
					. " VALUES (:id, :nome, :cpf, :email, :senha, :ativo, :administrador, :id_dados_bancario)";
		$params = array(
    		':id' => $this->pdo->NextValSequence($usuarioSequence),
    		':nome' => $usuario->getNome(),
    		':cpf' => $usuario->getCpf(),  		
    		':email' => $usuario->getEmail(),
    		':senha' => $usuario->getSenha(),
    		':ativo' => TRUE,
    		':administrador' => FALSE,
    		':id_dados_bancario' => $pdo->GetLastID()
    	);
    	$resultadoCadastroUsuario = $this->pdo->ExecuteNonQuery($sql, $params);

    	if (!$resultadoCadastroUsuario) {
    		$this->pdo->Rollback();
    		die("Erro ao cadastrar o Usuário.");
    	} else {
    		$this->pdo->Commit();
    	}

    	return true;

	}
}
?>