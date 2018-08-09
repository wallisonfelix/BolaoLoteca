<!DOCTYPE html>
<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema para o Gerenciamento de Bolões entre Amigos para Aposta na LOTECA - Loteria da Caixa Econômica Federal (CEF)">
    <meta name="author" content="Wallison Félix">

    <title>Bolão da Loteca</title>

    <link rel="icon" href=".././images/dinheiro.ico" />

    <!-- Bootstrap core CSS-->
    <link href=".././vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href=".././vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href=".././vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=".././css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="?pagina=home">
        <img class="img-fluid" src=".././images/logo_loteca.jpg" alt="Logo da Loteca" width="200px">
      </a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="?pagina=edicao_usuario">Cadastro</a>            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../login.php" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="?pagina=home">
            <i class="fas fa-fw fa-binoculars"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="?pagina=cadastro_aposta">
            <i class="fas fa-fw fa-plus"></i>
            <span>Cadastrar Aposta</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="?pagina=edicao_aposta">
            <i class="fas fa-fw fa-recycle"></i>
            <span>Atualizar Aposta</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="?pagina=listagem_concurso">
            <i class="fas fa-fw fa-archive"></i>
            <span>Concursos Anteriores</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Administração</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Cadastros:</h6>
            <a class="dropdown-item" href="?pagina=listagem_banco">Bancos</a>
            <a class="dropdown-item" href="?pagina=listagem_usuario">Usuários</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Apostas:</h6>
            <a class="dropdown-item" href="?pagina=listagem_possibilidade">Possibilidades</a>
            <a class="dropdown-item" href="?pagina=listagem_concurso">Concursos</a>
            <a class="dropdown-item" href="?pagina=listagem_jogo">Jogos</a>
          </div>
        </li>        
      </ul>

      <div id="content-wrapper">

        <div id="conteudo" class="container-fluid">                
          <?php
            require_once(".././Util/RequestPage.php");
          ?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Bolão da Loteca 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Click em Logout se realmente deseja encerrar esta sessão.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cencelar</button>
            <a class="btn btn-primary" href="../login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=".././vendor/jquery/jquery.min.js"></script>
    <script src=".././vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src=".././vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src=".././vendor/chart.js/Chart.min.js"></script>
    <script src=".././vendor/datatables/jquery.dataTables.js"></script>
    <script src=".././vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src=".././js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src=".././js/demo/datatables-demo.js"></script>
    <script src=".././js/demo/chart-area-demo.js"></script>

  </body>

</html>
