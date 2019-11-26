<?php
$Control = $_GET["control"];

require_once "controller.php";
require_once "crud.php";

$Resultado = new Controller();
$Resultado -> ctlBuscaControlAjax("alumnos", $Control);

?>