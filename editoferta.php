<?php session_start();
if(!$_SESSION["valido"]){
  header("location:index.php");
  exit();
}

require_once "includes/controller.php";
require_once "includes/crud.php";

$idBuscar = $_REQUEST['idEditar'];
?>
<!DOCTYPE html>
<html lang="en">
  <?php
    include "includes/menus/head.php";
  ?>


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
            <h1 class="m-0 text-dark">Editar Paquete</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php
          $respuesta = Datos::busca($idBuscar, "oferta");
        ?>

      <form role="form" method="post">

        <div class="row">

          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Caracter&iacute;sticas</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-4">
                        <label for="exampleInputPassword1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value ="<?php echo $respuesta['materia'];?>">
                      </div>
                      <div class="col-4">
                         <label for="exampleInputPassword1">Costo</label>
                        <input type="text" class="form-control" name="costo" value ="<?php echo $respuesta['docente'];?>">
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
              <button type="submit" name="actualizar" class="btn btn-warning">Actualizar Datos</button>
            </div>
          </div>
          </div>
          <div class="col-lg-4">
          </div>
        </div>
        <input type="hidden" id="id" name="id" value="<?php echo $idBuscar; ?>">

       </form>
       <?php

       $ingreso = new Controller();
       $ingreso -> actualizaPaquete();

       ?>


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
