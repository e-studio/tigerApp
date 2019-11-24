<?php session_start();
if(!$_SESSION["valido"]){
  header("location:index.php");
  exit();
}
require_once "includes/controller.php";
require_once "includes/crud.php";

$registro = new Controller();
$combo = new Controller();
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
<!-- Formateo de moneda para numeros -->
  <script src="formato/numeral.js"></script>

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
            <h1 class="m-0 text-dark">Venta de Paquete</h1>
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
                <h3 class="card-title">Seleccione cliente y paquete</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-8">
                        <label for="exampleInputPassword1">Socio</label>
                        <select class="form-control" name="socio" onchange="buscaClases(this.value)" required>
                          <?php $combo -> listaCombo("socios"); ?>
                        </select>

                      </div>
                      <div class="col-4">
                        <label for="exampleInputPassword1">Clases disponibles</label>
                        <input type="text" class="form-control" placeholder="" id="clasesDisp" name="clasesDisp">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-8">
                        <label for="exampleInputPassword1">Paquete</label>
                        <select class="form-control" name="paquete" onchange="buscaPaquete(this.value)" required>
                          <?php $combo -> listaCombo("paquetes"); ?>
                        </select>
                      </div>
                      <div class="col-4">
                         <!-- <label for="exampleInputPassword1">Costo</label> -->
                         <label><h5><strong>Costo</strong></h5></label><h2><p align="right"id="ventaTitulo"><span>$</span> 0</p></h2>
                        <input type="text" class="form-control" placeholder="" id="costo" name="costo">
                        <input type="text" class="form-control" placeholder="" id="clases" name="clases">
                        <input type="text" class="form-control" placeholder="" id="caducidad" name="caducidad">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
         </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-1">
          </div>
          <div class="col-lg-4">
            <div class="card card-info">
            <div class="card-body" style="text-align: center">
              <a href="paquetes.php" class="btn btn-secondary" >Cancelar</a>
              <button type="submit" id="btnComprar" disabled="true" class="btn btn-success">Comprar</button>
            </div>
          </div>
          </div>
          <div class="col-lg-4">
          </div>
        </div>
        <?php
          $registro -> compraPaquete();
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

<script src="includes/busquedas.js"></script>
</body>
</html>
