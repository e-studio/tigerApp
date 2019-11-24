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
            <h1 class="m-0 text-dark">Datos de Socio</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php
          $respuesta = Datos::busca($idBuscar, "socios");
        ?>

      <form role="form" method="post">

        <div class="row">

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Membresía: <?php echo $idBuscar; ?> </h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" value ="<?php echo $respuesta['nombre'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Apellidos</label>
                    <div class="row">
                      <div class="col-6">
                        <input type="text" class="form-control" name="aPaterno" value ="<?php echo $respuesta['aPaterno'];?>">
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" name="aMaterno" value ="<?php echo $respuesta['aMaterno'];?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3" name="activo" <?php if($respuesta['activo']=="on") echo "checked";?> >
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
                  <input type="text" class="form-control" name="telefono" value ="<?php echo $respuesta['telefono'];?>">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" name="email" value ="<?php echo $respuesta['email'];?>">
                </div>

              </div>
            </div>

            <div class="card card-info">
              <div class="card-header">
                <h5 class="m-0">Membresía</h5>
              </div>
              <div class="card-body">
                <div class="form-group">

                    <div class="row">
                      <div class="col-5">
                        <label for="exampleInputPassword1">Registrado desde:</label>
                        <input  type="date" class="form-control" name="fechaIngreso" value ="<?php echo $respuesta['fechaIngreso'];?>">
                      </div>
                      <div class="col-2">
                        <label for="exampleInputPassword1">Clases</label>
                        <input type="text" class="form-control" placeholder="Disponibles" name="clases" value ="<?php echo $respuesta['clases'];?>">
                      </div>
                      <div class="col-5">
                        <label for="exampleInputPassword1">Caducidad</label>
                        <input type="text" class="form-control" name="caducidad" value ="<?php echo $respuesta['caducidad'];?>">
                      </div>
                    </div>
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
              <button type="submit" id="actualizar" name="actualizar" class="btn btn-warning">Actualizar Datos</button>
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
       $ingreso -> actualizaSocio();

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

<!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="deleteModalLabel">Delete confirmation</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            <h5>Are you sure you want to delete this order ?</h5>
            <br><br>

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-danger" onclick="borraOrden()"> Yes, Delete</button>

          </div>
        </div>
      </div>
    </div>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
