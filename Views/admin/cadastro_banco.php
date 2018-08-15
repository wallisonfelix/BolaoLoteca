<?php

require_once(".././Controller/BancoController.php");
require_once(".././Model/Banco.php");
  
  $edicao = false;
  $mensagens = [];

  $bancoController = new BancoController();
  $banco = new Banco();  

  if (filter_input(INPUT_GET, "idBanco", FILTER_SANITIZE_NUMBER_INT)) {    
    $banco = $bancoController->obterBancoPorId(filter_input(INPUT_GET, "idBanco", FILTER_SANITIZE_NUMBER_INT));

    if ($banco == null) {
      $mensagens[] = array(
        "danger" => "Banco Selecionado para Edição não Encontrado", 
      );
    } else {
      $edicao = true;
    }
  }

  if (filter_input(INPUT_POST, "btnCadastrar", FILTER_SANITIZE_STRING)) {    
    $banco->setCodigo(filter_input(INPUT_POST, "txtCodigo", FILTER_SANITIZE_NUMBER_INT));
    $banco->setNome(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));

    $idBanco = filter_input(INPUT_POST, "idBanco", FILTER_SANITIZE_NUMBER_INT);
    
    if ($idBanco != null && $idBanco > 0) {
      $banco->setId($idBanco);
      if ($bancoController->editarBanco($banco)) {
        $mensagens[] = array(
          "success" => "Banco Editado com Sucesso", 
        );
      } else {
         $mensagens[] = array(
          "danger" => "Erro ao Editar Banco", 
        );
      }
    } else {
      $banco->setId(0);
      if ($bancoController->cadastrarBanco($banco)) {
        $mensagens[] = array(
          "success" => "Banco Editado com Sucesso", 
        );
      } else {
         $mensagens[] = array(
          "danger" => "Erro ao Editar Banco", 
        );
      }     
    }
  }

?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="?pagina=home">Home</a>
    </li>
    <li class="breadcrumb-item">Administração</li>
    <li class="breadcrumb-item active">
      <?php
        if ($edicao) {
          echo "Editar Banco";
        } else {
          echo "Cadastrar Banco";
        }
      ?>
    </li>
  </ol>

  <div id="mensagens">
    <?php

    ?>   
  </div>

  <form method="post" id="formCadastrarBanco" name="formCadastrarBanco" novalidate>

    <?php
      if ($edicao) {
        echo "<input id=\"idBanco\" name=\"idBanco\" type=\"hidden\" value=\"".$banco->getId()."\"/>";
      } ?>

    <div class="form-group">
      <div class="form-row">        
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="text" id="txtCodigo" name="txtCodigo" class="form-control" placeholder="Código" required="required" 
            <?php
              if ($edicao) {
                echo "value=\"".$banco->getCodigo()."\"";
              }
            ?>>
            <label for="txtCodigo">Código</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-label-group">
            <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus"
            <?php
              if ($edicao) {
                echo "value=\"".$banco->getNome()."\"";
              }
            ?>>
            <label for="txtNome">Nome</label>
          </div>
        </div>
      </div>
    </div>

     <input type="submit" class="btn btn-primary btn-block" name="btnCadastrar" value="<?php
              if ($edicao) {
                echo "Editar";
              } else {
                echo "Cadastrar";
              }
            ?>"/>
  </form>
  
</div>
        