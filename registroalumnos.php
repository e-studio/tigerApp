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

  <title>Cbtis 117 | Registrar alumnos</title>

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
            if ($_SESSION["rol"] == 0){
              include "includes/menus/menuAdmin.php";
            }
            else{
              include "includes/menus/menu.php";
            }
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Registrar un alumno</h4>
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
                                                <input type="text" class="form-control" placeholder="" id="noControl" name="noControl" onchange="">
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                        		<label>Nombre</label>
                                        		<input type="text" class="form-control" placeholder="" name="nombre">
                                        	</div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                        		<label>Apellido paterno</label>
                                        		<input type="text" class="form-control" placeholder="" name="apaterno">
                                        	</div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                        		<label>Apellido materno</label>
                                        		<input type="text" class="form-control" placeholder="" name="amaterno">
                                        	</div>
                                        </div>

                            		</div>
                            	</div>
                            </div>
                            <div class="col-md-6">
                            	<div class="col-md-12">
	                        		<div class="card card-success">
	                        			<div class="card-header with-border">
	                        				<h3 class="card-title">Datos escolares</h3>
	                        			</div>
	                        			<div class="card-body">
	                        				<div class="row">
	                        					<div class="col-md-6">
	                        						<label>Grado</label>
	                        						<select class="form-control">
	                        						<option value="1">1</option>
	                        						<option value="2">2</option>
	                        						<option value="3">3</option>
	                        						<option value="4">4</option>
	                        						<option value="5">5</option>
	                        						<option value="6">6</option>
	                        						</select>
	                        					</div>
	                        					<div class="col-md-6">
	                        						<label>Grupo</label>
	                        						<select class="form-control">
	                        							<option value="A">A</option>
	                        							<option value="B">B</option>
	                        							<option value="C">C</option>
	                        							<option value="D">D</option>
	                        							<option value="E">E</option>
	                        							<option value="F">F</option>
	                        							<option value="G">G</option>
	                        							<option value="H">H</option>
	                        							<option value="I">I</option>
	                        							<option value="J">J</option>
	                        							<option value="K">K</option>
	                        							<option value="L">L</option>
	                        						</select>
	                        					</div>
	                        				</div>
	                        				<br>
	                        				<div class="row">
	                        					<div class="col-sm-12">
	                        						<select class="form-control" name="especialidad">
	                        							<option value="">Especialidad</option>
	                        							<?php
	                        							$Especialidad = new Controller();
	                        							$Especialidad -> ctlBuscarEspecialidades();
	                        							?>
	                        						</select>

	                        					</div>
	                        				</div>
	                        			</div>
	                        		</div>
                        		</div>
                        		<div class="col-md-12">
                        			<input type="submit" class="btn btn-primary" name="">
                        		</div>
                            </div>
                        </div>

                        <?php
                          $Registro = new Controller();
                          $Registro -> ctlRegistroAlumno();

                        ?>
                    </form>

            </div>

        </div>

  </div>
  <?php
    include "includes/menus/footer.php";
  ?>
</div>

<script language=javascript>
   /* function imprime(url){
    window.open(url, "Diseño Web", "width=800, height=600")
    }*/
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