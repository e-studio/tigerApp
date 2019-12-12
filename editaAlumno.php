<?php
  header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!$_SESSION["valido"]) {
        header("location:index.php");
        exit();
    }
    require_once "includes/controller.php";
    require_once "includes/crud.php";

    $noCon = $_REQUEST['idEditar'];
?>

<!DOCTYPE html>
<html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="favicon.ico" />

  <title>Cbtis 117 | Actualiza alumnos</title>

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
                  <?php
                  $respuesta = Datos::buscaal($noCon, "alumnos");
                  ?>

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
                                                <input type="text" class="form-control" placeholder="" id="noControl" name="noControl"  value ="<?php echo $noCon;?>" disabled onchange="">
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                        		<label>Nombre</label>
                                        		<input type="text" class="form-control" placeholder="" name="nombre"  value ="<?php echo $respuesta['apellidoMat'];?>">
                                        	</div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                        		<label>Apellido paterno</label>
                                        		<input type="text" class="form-control" placeholder="" name="apaterno" value ="<?php echo $respuesta['nombres'];?>">
                                        	</div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-12">
                                        		<label>Apellido materno</label>
                                        		<input type="text" class="form-control" placeholder="" name="amaterno" value ="<?php echo $respuesta['apellidoPat'];?>">
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
	                        						<select class="form-control" name="grado" id="grado">
                                        <?php if($respuesta['grado']==1){
                                          echo "<option selected value='1'>1</option>";
                                        }else{
                                          echo "<option  value='1'>1</option>";
                                          }
                                          if($respuesta['grado']==2){
                                          echo "<option selected value='2'>2</option>";
                                        }else{
                                          echo "<option  value='2'>2</option>";
                                          }
                                          if($respuesta['grado']==3){
                                          echo "<option selected value='3'>3</option>";
                                        }else{
                                          echo "<option  value='3'>3</option>";
                                          }
                                          if($respuesta['grado']==4){
                                          echo "<option selected value='4'>4</option>";
                                        }else{
                                          echo "<option  value='4'>4</option>";
                                          }
                                          if($respuesta['grado']==5){
                                          echo "<option selected value='5'>5</option>";
                                        }else{
                                          echo "<option  value='5'>5</option>";
                                          }
                                          if($respuesta['grado']==6){
                                          echo "<option selected value='6'>6</option>";
                                        }else{
                                          echo "<option  value='6'>6</option>";
                                          }?>
	                        						</select>
	                        					</div>
	                        					<div class="col-md-6">
	                        						<label>Grupo</label>
	                        						<select class="form-control" name="grupo" id="grupo">
                                        <?php if($respuesta['grupo']=='A'){
                                          echo "<option selected value='A'>A</option>";
                                        }else{
                                          echo "<option  value='A'>A</option>";
                                          }
                                          if($respuesta['grupo']=="B"){
                                          echo "<option selected value='B'>B</option>";
                                        }else{
                                          echo "<option  value='B'>B</option>";
                                          }
                                          if($respuesta['grupo']=="C"){
                                          echo "<option selected value='C'>C</option>";
                                        }else{
                                          echo "<option  value='C'>C</option>";
                                          }
                                          if($respuesta['grupo']=="D"){
                                          echo "<option selected value='D'>D</option>";
                                        }else{
                                          echo "<option  value='D'>D</option>";
                                          }
                                          if($respuesta['grupo']=="E"){
                                          echo "<option selected value='E'>E</option>";
                                        }else{
                                          echo "<option  value='E'>E</option>";
                                          }
                                          if($respuesta['grupo']=="F"){
                                          echo "<option selected value='F'>F</option>";
                                        }else{
                                          echo "<option  value='F'>F</option>";
                                          }
                                          if($respuesta['grupo']=='G'){
                                          echo "<option selected value='G'>G</option>";
                                        }else{
                                          echo "<option  value='G'>G</option>";
                                          }
                                          if($respuesta['grupo']=="H"){
                                          echo "<option selected value='H'>H</option>";
                                        }else{
                                          echo "<option  value='H'>H</option>";
                                          }
                                          if($respuesta['grupo']=="I"){
                                          echo "<option selected value='I'>I</option>";
                                        }else{
                                          echo "<option  value='I'>I</option>";
                                          }
                                          if($respuesta['grupo']=="J"){
                                          echo "<option selected value='J'>J</option>";
                                        }else{
                                          echo "<option  value='J'>J</option>";
                                          }
                                          if($respuesta['grupo']=="K"){
                                          echo "<option selected value='K'>K</option>";
                                        }else{
                                          echo "<option  value='K'>K</option>";
                                          }
                                          if($respuesta['grupo']=="L"){
                                          echo "<option selected value='L'>L</option>";
                                        }else{
                                          echo "<option  value='L'>L</option>";
                                          }?>
	                        						</select>
	                        					</div>
	                        				</div>
	                        				<br>
	                        				<div class="row">
	                        					<div class="col-sm-12">
                                      <label>Especialidad</label>
	                        						<select class="form-control" name="especialidad">
	                        							
	                        							<?php
	                        							$Especialidad = new Controller();
	                        							$Especialidad -> ctlBuscarEspecialidades2($respuesta['especialidad']);
	                        							?>
	                        						</select>
	                  
	                        					</div>
	                        				</div>
	                        			</div>
	                        		</div>
                        		</div>
                        		<div class="col-md-12">
                        			<input type="submit" class="btn btn-primary" name="" >
                        		</div>
                            </div>
                        </div>

                        <?php
                          $Registro = new Controller();
                          $Registro -> ctlActualizaAlumno($noCon);

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