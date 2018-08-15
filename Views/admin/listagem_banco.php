<?php

require_once(".././Controller/BancoController.php");
require_once(".././DAO/BancoDAO.php");
require_once(".././Model/Banco.php");

  $bancoController = new BancoController();

  $bancos;

  if (filter_input(INPUT_POST, "btnListar", FILTER_SANITIZE_STRING)) {    
    $bancoFiltros = new Banco();

    $bancoFiltros->setNome(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING));

    $bancos = $bancoController->listarBanco($bancoFiltros);
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
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-filter"></i>Filtros</div>
      
      <br />

      <form method="post" id="formListarBanco" name="formListarBanco" novalidate>
        <div class="form-group">
          <div class="form-row">            
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="txtNome" name="txtNome" class="form-control" placeholder="Nome">
                <label for="txtNome">Nome</label>
              </div>
            </div>
          </div>
        </div>

        <input type="submit" class="btn btn-primary btn-block" name="btnListar" value="Listar"/>
      </form>

  </div>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>Lista</div>
    <div class="card-body">
      <div class="table-responsive">
        <?php
          if (isset($bancos)) {
        ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nome</th>              
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Código</th>
                <th>Nome</th>              
              </tr>
            </tfoot>
            <tbody>
              <?php
                foreach ($bancos as $banco) {
              ?>
                <tr>
                  <td><?= $banco->getCodigo(); ?></td>
                  <td><?= $banco->getNome(); ?></td>
                  <td></td>
                </tr> 
              <?php
                }
              ?>             
            </tbody>
          </table>
        <?php
          } else {
        ?>
          <div class="alert alert-warning" role="alert">Nenhum Banco Retornado na Consulta</div>
        <?php
          }
        ?>
      </div>
    </div>    
  </div>

</div>
        