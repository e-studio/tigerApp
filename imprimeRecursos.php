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
        <th style="width: 120px">
          <img src="dist/img/tiger.png" alt="" width="80px" height="80px">
        </th>
        <th style="text-align: left">
          <strong >Centro de Bachillerato Tecnologico </strong><br>
          <strong>Industrial y de Servicios No. 117</strong><br> 
          <strong>curso intersemestral</strong><br>  
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
<table border="1" width="90%" border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
    </tr>
    <tr style="background-color: #a5a4a7">
      <th style="width: 20px;">#</th>
      
      <th style="width: 400px;">Nombre</th>
      <th style="width: 20px;">Grupo</th>
      <th style="width: 20px;">1</th>
      <th style="width: 20px;">2</th>
      <th style="width: 20px;">3</th>
      <th style="width: 20px;">4</th>
      <th style="width: 20px;">5</th>
      <th style="width: 20px;">6</th>
      <th style="width: 20px;">7</th>
      <th style="width: 20px;">8</th>
      <th style="width: 20px;">9</th>
      <th style="width: 20px;">10</th>
      <th style="width: 20px;">11</th>
      <th style="width: 20px;">12</th>
      <th style="width: 20px;">13</th>
      <th style="width: 20px;">14</th>
      <th style="width: 20px;">15</th>
      <th colspan="2">Calificación</th>

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
