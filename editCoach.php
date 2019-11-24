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
            <h1 class="m-0 text-dark">Editar datos de Coach</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php
          $respuesta = Datos::busca($idBuscar, "coachs");
        ?>

      <form role="form" method="post">

        <div class="row">

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Coach ID: <?php echo $idBuscar; ?></h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-8">
                        <label for="exampleInputPassword1">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value ="<?php echo $respuesta['Nombre'];?>">
                      </div>
                      <div class="col-4">
                         <label for="exampleInputPassword1">Nick Name</label>
                        <input type="text" class="form-control" name="nickName" value ="<?php echo $respuesta['nickName'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Apellidos</label>
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
                    <div class="row">
                      <div class="col-6">
                        <label for="exampleInputEmail1">Fecha ingreso</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="fechaIngreso" value ="<?php echo $respuesta['fechaIngreso'];?>">
                      </div>
                      <div class="col-1">
                      </div>

                    <div class="col-5">
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3" name="activo" <?php if($respuesta['activo']=="on") echo "checked";?> >
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

          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
          </div>
          <div class="col-lg-4">
            <div class="card card-info">
            <div class="card-body" style="text-align: center">
              <a href="coaches.php" class="btn btn-secondary" >Cancelar</a>
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
        $registro = new Controller();
        $registro -> actualizaCoach();
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
