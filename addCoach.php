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
            <h1 class="m-0 text-dark">Registro de Coach</h1>
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
                    <div class="row">
                      <div class="col-8">
                        <label for="exampleInputPassword1">Nombre</label>
                        <input type="text" class="form-control" placeholder="" name="nombre">
                      </div>
                      <div class="col-4">
                         <label for="exampleInputPassword1">Nick Name</label>
                        <input type="text" class="form-control" placeholder="" name="nick">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Apellidos</label>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" class="form-control" placeholder="Paterno" name="aPaterno">
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" placeholder="Materno" name="aMaterno">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Fecha ingreso</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" placeholder="fecha de ingreso" name="fechaIngreso">
                      </div>
                      <div class="col-1">
                      </div>

                    <div class="col-5">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3" name="activo">
                      <label class="custom-control-label" for="customSwitch3">Activo</label>
                    </div>
                    </div>
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
                  <input type="text" class="form-control" placeholder="M&oacute;vil" name="telefono">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email" name="email">
                </div>

              </div>
            </div>

            <!-- <div class="card card-info">
              <div class="card-header">
                <h5 class="m-0">Membresía</h5>
              </div>
              <div class="card-body">
                <div class="form-group">

                    <div class="row">
                      <div class="col-5">
                        <label for="exampleInputPassword1">Registrado desde:</label>
                        <input type="date" class="form-control" placeholder="Fecha de Registro">
                      </div>
                      <div class="col-2">
                        <label for="exampleInputPassword1">Clases</label>
                        <input type="text" class="form-control" placeholder="Disponibles" value="0">
                      </div>
                      <div class="col-5">
                        <label for="exampleInputPassword1">Caducidad</label>
                        <input type="text" class="form-control" placeholder="Materno">
                      </div>
                    </div>
                  </div>
              </div>
            </div> -->
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
          </div>
          <div class="col-lg-4">
            <div class="card card-info">
            <div class="card-body" style="text-align: center">
              <a href="coaches.php" class="btn btn-secondary" >Cancelar</a>
              <button type="submit" class="btn btn-success">Grabar Datos</button>
            </div>
          </div>
          </div>
          <div class="col-lg-4">
          </div>
        </div>
        <?php
          $registro = new Controller();
          $registro -> registroCoach();
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
