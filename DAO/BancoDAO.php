<?php

require_once("DataBase.php");
require_once(".././Model/Banco.php");

class BancoDAO {

	private static $bancoSequence = "cadastros.banco_sequence";	
	
	private $pdo;

	public function __construct() {
		$this->pdo = new DataBase();
	}	

	public function cadastrarBanco($banco) {		
		$sql = "INSERT INTO cadastros.banco(id, codigo, nome)"
					. " VALUES (nextval('".self::$bancoSequence."'), :codigo, :nome)";
		$params = array(
    		':codigo' => $banco->getCodigo(),
    		':nome' => $banco->getNome()    		
    	);
    
    	return $this->pdo->ExecuteNonQuery($sql, $params);;
	}

    public function editarBanco($banco) {        
        $sql = "UPDATE cadastros.banco"
                    . " SET codigo = :codigo, nome = :nome"
                    . " WHERE id = :id";
        $params = array(
            ':codigo' => $banco->getCodigo(),
            ':nome' => $banco->getNome(),
            ':id' => $banco->getId(),
        );
    
        return $this->pdo->ExecuteNonQuery($sql, $params);;
    }

    public function listarBanco($banco) {        
        $sql = "SELECT id, codigo, nome FROM cadastros.banco"
                    . " WHERE nome ILIKE :nome ORDER BY codigo";
        $params = array(
            ':nome' => "%{$banco->getNome()}%"          
        );
    
        $queryBancoResultado = $this->pdo->ExecuteQuery($sql, $params);        

        $listaBanco = [];   
        foreach ($queryBancoResultado as $resultado) {
            $bancoRetornado = new Banco();

            $bancoRetornado->setId($resultado["id"]);
            $bancoRetornado->setCodigo($resultado["codigo"]);    
            $bancoRetornado->setNome($resultado["nome"]);

            $listaBanco[] = $bancoRetornado;
        }

        return $listaBanco;
    }

    public function obterBancoPorId($idBanco) {        
        $sql = "SELECT id, codigo, nome FROM cadastros.banco"
                    . " WHERE id = :id";
        $params = array(
            ':id' => $idBanco
        );
    
        $queryBancoResultado = $this->pdo->ExecuteQueryOneRow($sql, $params);

        $banco = null;
        if (!empty($queryBancoResultado)) {
            $banco = new Banco();

            $banco->setId($queryBancoResultado["id"]);
            $banco->setCodigo($queryBancoResultado["codigo"]);    
            $banco->setNome($queryBancoResultado["nome"]);
        }
        
        return $banco;        
    }

    public function quantidadeOutrosBancosPorCodigo($idBanco, $codigo) { 
        $sql = "SELECT count(1) FROM cadastros.banco"
                    . " WHERE id != :id AND codigo = :codigo";
        $params = array(
            ':id' => $idBanco,
            ':codigo' => $codigo
        );
    
        return $this->pdo->ExecuteQueryCount($sql, $params);
    }
}
?>