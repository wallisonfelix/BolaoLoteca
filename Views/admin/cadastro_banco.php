<?php

require_once("./Controller/UsuarioController.php");
require_once("./DAO/UsuarioDAO.php");
require_once("./Model/Usuario.php");
require_once("./Model/DadosBancario.php");

  $usuarioController = new UsuarioController();

  $mensagemResultadoCadastroUsuario = "";

  if (filter_input(INPUT_POST, "btnCadastrar", FILTER_SANITIZE_STRING)) {
    $usuario = new Usuario();
    $dadosBancario = new DadosBancario();        
    $banco = new Banco();

    $usuario->setNome(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));
    $usuario->setCpf(filter_input(INPUT_POST, "txtCpf", FILTER_SANITIZE_STRING));
    $usuario->setEmail(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_STRING));
    $usuario->setSenha(filter_input(INPUT_POST, "txtSenha", FILTER_SANITIZE_STRING));
    
    $dadosBancario->setAgencia(filter_input(INPUT_POST, "txtAgencia", FILTER_SANITIZE_STRING));
    $dadosBancario->setConta(filter_input(INPUT_POST, "txtConta", FILTER_SANITIZE_STRING));
    $dadosBancario->setInformacoesComplementares(filter_input(INPUT_POST, "txtInformacoesComplementares", FILTER_SANITIZE_STRING)); 

    $banco->setId(filter_input(INPUT_POST, "slctBanco", FILTER_SANITIZE_NUMBER_INT)); 

    $dadosBancario->setBanco($banco);
    $usuario->setDadosBancario($dadosBancario);

    if ($usuarioController->cadastrarUsuario($usuario)) {
      $mensagemResultadoCadastroUsuario = "Usuário Cadastrado com Sucesso.";
    } else {
      $mensagemResultadoCadastroUsuario = "Erro ao Cadastrar Usuário.";
    }
  }

?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="home.html">Home</a>
    </li>
    <li class="breadcrumb-item">Administração</li>
    <li class="breadcrumb-item active">Listar Banco</li>
  </ol>

  <!-- Page Content -->
  <h1 class="display-1">404</h1>
  <p class="lead">Página não encontrada. Você pode 
    <a href="javascript:history.back()">voltar para a página anterior</a> ou ir para a <a href="home.html">Home</a>.</p>

</div>
        