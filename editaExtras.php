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
                <h4 class="m-0 text-dark">Correcciones de extraordinarios</h4>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>

        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <div class="card card-primary">
                <div class="card-header">
                    Número de control
                </div>
                <div class="card-body">
                    <form method="POST" action="editaExtrasAlumno.php">
                    <div class="row">
                       <div class="col-sm-7">
                          <div class="input-group input-group-sm mb-3">
                            <input type="text" name="noControl" class="form-control" placeholder="14 digitos" value=""aria-label="nombre" aria-describedby="addonBusqueda">
                          </div>
                        </div>
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" name="buscar" class="btn btn-primary btn-block btn-flat">Buscar</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
              </div>
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
</body>
</html>