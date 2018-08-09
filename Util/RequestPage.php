<?php

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_STING);

$arrayPaginas = array(
	"home" => ".././Views/home.php",
	//Cadastros 
	"edicao_usuario" => ".././Views/cadastros/cadastro_usuario.php", 
	"cadastro_usuario_inativado" => ".././Views/cadastros/cadastro_usuario_inativado.php",
	//Apostas 
	"cadastro_aposta" => ".././Views/apostas/cadastro_aposta.php", 
	"edicao_aposta" => ".././Views/apostas/edicao_aposta.php", 
	"listagem_concurso" => ".././Views/apostas/listagem_concurso.php", 
	"visualizacao_concurso" => ".././Views/apostas/visualizacao_concurso.php", 
	//Administracao 
	"listagem_banco" => ".././Views/admin/listagem_banco.php",
	"cadastro_banco" => ".././Views/admin/cadastro_banco.php",
	"edicao_banco" => ".././Views/admin/cadastro_banco.php",
	"listagem_usuario" => ".././Views/admin/listagem_usuario.php",
	"listagem_possibilidade" => ".././Views/admin/listagem_possibilidade.php",
	"cadastro_possibilidade" => ".././Views/admin/cadastro_possibilidade.php",
	"edicao_possibilidade" => ".././Views/admin/cadastro_possibilidade.php",
	"cadastro_concurso" => ".././Views/admin/cadastro_concurso.php", 
	"edicao_concurso" => ".././Views/admin/cadastro_concurso.php", 	
	"listagem_jogo" => ".././Views/admin/listagem_jogo.php",
	"cadastro_jogo" => ".././Views/admin/cadastro_jogo.php",
	"edicao_jogo" => ".././Views/admin/cadastro_jogo.php"
);

if ($pagina) {
	$paginaMapeada = false;

	foreach ($arrayPaginas as $page => $key) {
		if ($pagina == $page) {
			$paginaMapeada = true;
			require_once($key);
		}
	}

	if (!$paginaMapeada) {
		require_once(".././Views/404.php");
	}
} else {
	require_once(".././Views/404.php");
}
?>
