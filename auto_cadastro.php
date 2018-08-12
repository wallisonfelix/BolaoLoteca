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

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Sistema para o Gerenciamento de Bolões entre Amigos para Aposta na LOTECA - Loteria da Caixa Econômica Federal (CEF)">
    <meta name="author" content="Wallison Félix">

    <title>Bolão da Loteca</title>

    <link rel="icon" href=".././images/icones/dinheiro.ico" />

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Auto Cadastro</div>
        <div class="card-body">
          <div class="form-row">
            <div class="col-md-6">
              <?=$mensagemResultadoCadastroUsuario;?>
            </div>
          </div>
          <form method="post" id="formCadastrarUsuario" name="formCadastrarUsuario" novalidate>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">
                    <label for="txtNome">Nome</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="txtCpf" name="txtCpf" class="form-control" placeholder="CPF" required="required">
                    <label for="txtCpf">CPF</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Email" required="required">
                    <label for="txtEmail">Email</label>
                  </div>
                </div>
              </div>    
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Senha" required="required">
                    <label for="txtSenha">Senha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="txtConfirmacaoSenha" name="txtConfirmacaoSenha" class="form-control" placeholder="Confirmação da Senha" required="required" onchange="checkConfirmacaoSenha();">
                    <label for="txtConfirmacaoSenha">Confirmação da Senha</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">Dados Bancário</div>
                    <hr />
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <div class="form-label-group">
                            <select id="slctBanco" name="slctBanco" class="form-control" required="required">
                              <option value="1">Banco do Brasil</option>
                              <option value="2">Bradesco</option>
                              <option value="3">Itaú</option>
                              <option value="4">Santander</option>
                              <option value="5">Caixa</option>
                            </select>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="txtAgencia" name="txtAgencia" class="form-control" placeholder="Agência" required="required">
                            <label for="txtAgencia">Agência</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="txtConta" name="txtConta" class="form-control" placeholder="Conta" required="required">
                            <label for="txtConta">Conta</label>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                          <div class="form-label-group">
                            <input type="text" id="txtInformacoesComplementares" name="txtInformacoesComplementares" class="form-control" placeholder="Informações Complementares">
                            <label for="txtInformacoesComplementares">Informações Complementares</label>
                          </div>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <input type="submit" class="btn btn-primary btn-block" name="btnCadastrar" value="Cadastrar"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login</a>
            <a class="d-block small" href="recuperar_senha.php">Esqueceu a Senha?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery -->
    <script src="js/jquery.mask.min.js"/></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

<script type="text/javascript">
  $(document).ready(function(){
    $("#txtCpf").mask("999.999.999-99");    
  });

  function checkConfirmacaoSenha() {
    if ($("#txtConfirmacaoSenha").val() != $("#txtSenha").val()) {    
      document.getElementById("txtConfirmacaoSenha").setCustomValidity("Senha de confirmação não corresponde à informada");
    } else {              
      document.getElementById("txtConfirmacaoSenha").setCustomValidity("");
    }
  }
</script>

</html>
