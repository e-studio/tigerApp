<?php session_start();
if(!$_SESSION["valido"]){
  header("location:index.php");
  exit();
}
require_once "includes/controller.php";
require_once "includes/crud.php";

setlocale(LC_ALL,"es_ES");

$idR = $_REQUEST['idRecurso'];

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lista de Alumnos Inscritos a Recurso</title>
</head>

<body>


  <table width="80%" border="0" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th style="width: 120px">
          <img src="dist/img/tiger.png" alt="" width="80px" height="80px">
        </th>
        <th style="text-align: left">
          <?php
                //$datos = new Controller();
                //$datos -> buscardatosREC($idR);
                $respuesta = Datos::buscardatosREC($idR);

                echo "<strong>Materia: </strong>".$respuesta['materia']."<br>";
                echo "<strong>Docente:  </strong>".$respuesta['docente']."<br>";
          ?>
        </th>
      </tr>
      <tr >
        <td colspan="2" style="text-align: center"><h3>Lista de Asistencia</h3></td>
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
      <th>Control</th>
      <th>Nombre</th>
      <th>calificacion</th>
      <th></th>
    </tr>
    </thead>
  <tbody>
    <?php
      $registro = new Controller();
      $registro -> imprimirListaRec($idR);
    ?>
  </tbody>

</table>
<hr>
</body>
</html>
