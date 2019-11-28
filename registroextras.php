<?php
  header("Content-Type: text/html;charset=utf-8");
	session_start();
	if (!$_SESSION["valido"]) {
		header("location:index.php");
        exit();
    }
    require_once "includes/controller.php";
    require_once "includes/crud.php";
?>

<!DOCTYPE html>
<html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="favicon.ico" />

  <title>Cbtis 117 | Extraordinarios</title>

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
        <?php
            include "includes/menus/navegacion.php";
            include "includes/menus/menuAdmin.php";
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Registro a extraordinarios</h4>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>

            <div class="content">
                <div class="container-fluid">
                    <form role="form" method="POST">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header with-border">
                                        <h3 class="card-title">Datos del alumno</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>No. de control</label>
                                                <input type="text" class="form-control" placeholder="" id="noControl" name="noControl" onchange="findNoControl(this.value, 'extra')">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="callout callout-danger">

                                          <h5><p id="nombre"></p></h5>
                                          <input type="hidden" class="form-control" name="nombreAlumno" id="nombreAlumno">

                                          <h5><p id="grupo"></p></h5>
                                          <input type="hidden" class="form-control" name="grupoAlumno" id="grupoAlumno">
                                          <h5><p id="inscrito"></p></h5>






                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="card card-primary">
                                    <div class="card-header with-border">
                                        <h3 class="card-title">Inscripciones</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" id="extra1">
                                            <div class="col-md-12">
                                                <label>Extraordinario 1</label>
                                                <select class="form-control" name="extra1">
                                                    <option value="">Seleccione</option>
                                                    <?php
                                                    $extras = new Controller();
                                                    $extras -> buscaMateria();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" id="extra2">
                                            <div class="col-md-12">
                                                <label>Extraordinario 2</label>
                                                <select class="form-control" name="extra2">
                                                    <option value="">Seleccione</option>
                                                    <?php
                                                    $extras = new Controller();
                                                    $extras -> buscaMateria();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" id="extra3">
                                            <div class="col-md-12">
                                                <label>Extraordinario 3</label>
                                                <select class="form-control" name="extra3">
                                                    <option value="">Seleccione</option>
                                                    <?php
                                                    $extras = new Controller();
                                                    $extras -> buscaMateria();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <input type="submit" disabled="true" class="btn btn-primary" id="btnGuardar" name="guardar" value="Guardar">
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

                        <?php
                          $registro = new Controller();
                          $registro -> registroExtra();

                        ?>
                    </form>
                    <div class="col-md-6">
                        <a href="" id="imprimir"> <button class="btn btn-info" disabled="true" id="btnImprimir" >Imprimir</button></a>
                    </div>

            </div>

        </div>

  </div>
  <?php
    include "includes/menus/footer.php";
  ?>
</div>

<script language=javascript>
    function imprime(url){
    window.open(url, "Diseño Web", "width=800, height=600")
    }
</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="includes/validar.js"></script>
<script src="includes/AjaxRegistro.js"></script>
</body>
</html>