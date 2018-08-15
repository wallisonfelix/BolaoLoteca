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
    		':nome' => $usuario->getNome()    		
    	);
    
    	return $this->pdo->ExecuteNonQuery($sql, $params);;
	}

    public function listarBanco($banco) {        
        $sql = "SELECT id, codigo, nome FROM cadastros.banco"
                    . " WHERE nome LIKE :nome";
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
}
?>