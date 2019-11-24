<?php session_start();
if(!$_SESSION["valido"]){
  header("location:index.php");
  exit();
}
require_once "includes/controller.php";
require_once "includes/crud.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Control Panel | Byso</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Sweet Alert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.16.3/dist/sweetalert2.all.min.js"></script>

</head>


<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?php
    include "includes/menus/navegacion.php";
    include "includes/menus/menuAdmin.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Registro de Socio Nuevo</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <form role="form" method="post">

        <div class="row">

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Datos Personales</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellidos</label>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="aPaterno" class="form-control" placeholder="Paterno" required>
                      </div>
                      <div class="col-6">
                        <input type="text" name="aMaterno" class="form-control" placeholder="Materno">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3" name="activo">
                      <label class="custom-control-label" for="customSwitch3">Activo</label>
                    </div>
                  </div>
                </div>
            </div>
         </div>

          <div class="col-lg-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Contacto</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" name="telefono" class="form-control" placeholder="M&oacute;vil" required>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

              </div>
            </div>
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
          </div>
          <div class="col-lg-4">
            <div class="card card-info">
            <div class="card-body" style="text-align: center">
              <a href="socios.php" class="btn btn-secondary" >Cancelar</a>
              <button type="submit" class="btn btn-success">Grabar Datos</button>
            </div>
          </div>
          </div>
          <div class="col-lg-4">
          </div>
        </div>

        <?php
          $registro = new Controller();
          $registro -> registroSocio();
        ?>

       </form>
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div> <!-- /.content-wrapper -->


  <!-- Main Footer -->
 <?php
    include "includes/menus/footer.php";
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
