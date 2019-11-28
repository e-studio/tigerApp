<?php session_start();
if(!$_SESSION["valido"]){
  header("location:index.php");
  exit();
}
require_once "includes/controller.php";
require_once "includes/crud.php";
$registro = new Controller();
$busca = new Controller();

$idEditar = $_REQUEST['idEditar'];
$respuesta = Datos::buscaUnExtra($idEditar);

?>
<!DOCTYPE html>
<html lang="es">
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
            <h1 class="m-0 text-dark">Corregir un Extraordinario</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form role="form" method="POST">

                        <div class="row">

                            <div class="col-md-6">
                                 <div class="card card-primary">
                                    <div class="card-header with-border">
                                        <h3 class="card-title"><?php echo $respuesta['nombre'].'<br>'.$respuesta['grupo']; ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="extra1">
                                            <div class="col-md-12">
                                                <label>Extraordinario</label>
                                                <select class="form-control" name="extra">
                                                    <option selected><?php echo $respuesta['materia']; ?></option>
                                                    <?php
                                                    $extras = new Controller();
                                                    $extras -> buscaMateria();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <a href="editaExtras.php" class="btn btn-secondary" >Cancelar</a>
                                 <input type="submit" class="btn btn-warning" id="btnGuardar" name="actualizar" value="Actualizar">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-2">
                                <div class="row">

                                    <div class="col-md-6">


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id" value="<?php echo $idEditar; ?>">

                        <?php
                          $registro = new Controller();
                          $registro -> actualizaExtra();

                        ?>
                    </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
            <h4 class="modal-title" id="deleteModalLabel">Confirme</h4>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            <h5>Borrar&aacute; este registro ?</h5>
            <br><br>

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-danger" onclick="borraRegistro()"> Si, borrar</button>

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

<script src="includes/validar.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>

<script language=javascript>
    function imprime(url){
    window.open(url, "Diseño Web", "width=800, height=600")
    }
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
