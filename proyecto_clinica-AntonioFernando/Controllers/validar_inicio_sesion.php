<?php
require_once('./../Models/BaseDatos.php');
$bd = new BaseDatos();
$supuesto_usuario = $_POST['usuario'];
$supuesta_password = $_POST['password'];

$bd->completar_inicio($supuesto_usuario,$supuesta_password );





?>

