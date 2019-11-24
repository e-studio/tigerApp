<?php
$codigo = $_GET['codigo'];

require_once "controller.php";
require_once "crud.php";

$precio = new Controller();
$precio->buscaPaqueteAjax("paquetes",$codigo);

?>