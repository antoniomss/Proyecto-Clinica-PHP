<?php
require_once('./../Models/Paciente.php');
$id = $_GET['id'];

$paciente = new Paciente();

$paciente->borrar_cita($id);

?>

