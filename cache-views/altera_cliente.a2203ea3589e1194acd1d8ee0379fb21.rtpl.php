<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">


	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- css bootstrap-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- jquery bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	

	
</head>
<body>

  <!--topo-->
	<ul class="nav">
  <li class="nav-item">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastro</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Usuario</a>
      <a class="dropdown-item" href="#">Clientes</a>
      <a class="dropdown-item" href="#">Produtos</a>
      <!--<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Link isolado</a>-->
    </div>
  </li>
 <!-- <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Desativado</a>
  </li>-->
</ul>
<!-- fim topo-->

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/clientes/<?php echo htmlspecialchars( $idcliente, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="idade">Idade</label>
              <input type="text" class="form-control" id="idade" name="idade" placeholder="Digite a idade" value="<?php echo htmlspecialchars( $idade, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="dataNascimento">Data Nascimento</label>
              <input type="date" class="form-control" id="dataNascimento" name="dataNascimento"  value="<?php echo htmlspecialchars( $dataNascimento, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>



            <div class="form-group">
              <label for="rua">rua</label>
              <input type="text" class="form-control" id="rua" name="rua" placeholder="ex: Rua Maria do Carmo" value="<?php echo htmlspecialchars( $rua, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>


            <div class="form-group">
              <label for="bairro">bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" placeholder="ex: Monte Claros" value="<?php echo htmlspecialchars( $bairro, ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
            </div>


            <div class="form-group">
              <label for="numero">N°</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="ex: 680" value="<?php echo htmlspecialchars( $numero, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>


            <div class="form-group">
              <label for="cep">cep</label>
              <input type="text" class="form-control" id="cep" name="cep" placeholder="ex: 798987" value="<?php echo htmlspecialchars( $cep, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>


            <div class="form-group">
              <label for="cidade">cidade</label>
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="ex: Campo Grande" value="<?php echo htmlspecialchars( $cidade, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>


            <div class="form-group">
              <label for="estado">estado</label>
              <input type="text" class="form-control" id="estado" name="estado" placeholder="ex: MS" value="<?php echo htmlspecialchars( $estado, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(##)####-####" value="<?php echo htmlspecialchars( $telefone, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="celular">Telefone</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="(##)#####-####" value="<?php echo htmlspecialchars( $celular, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
         
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="res/admin/dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

</body>
</html>