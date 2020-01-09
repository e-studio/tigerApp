<?php session_start();
if(!$_SESSION["valido"]){
  header("location:index.php");
  exit();
}
require_once "includes/controller.php";
require_once "includes/crud.php";

setlocale(LC_ALL,"es_ES");


$noControl = $_REQUEST['noControl'];
$nombre = $_REQUEST['nombre'];
$grupo = $_REQUEST['grupo'];



?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Recibo de Inscripción</title>
</head>

<body>


  <table width="80%" border="0" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th>
          <img src="loginAssets/images/cbtis.png" alt="" width="80px" height="80px">
        </th>
        <th style="text-align: left">
          <?php echo "<strong>No. Control: </strong> ".$noControl."<br>";
                echo "<strong>Nombre: </strong>".$nombre."<br>";
                echo "<strong>Grupo:  </strong>".$grupo."<br>";
                
          ?>
        </th>
      </tr>
    </thead>
  </table>
  <hr>
<table border="1" width="80%" border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
    </tr>
    <tr style="background-color: #a5a4a7">
      <th>#</th>
      <th>Materia</th>
    </tr>
    </thead>
  <tbody>
    <?php
      $registro = new Controller();
      $registro -> imprimirRecursos($noControl);
    ?>
  </tbody>

</table>
<hr>
</body>
</html>
