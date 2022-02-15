<?php
require_once('./Models/Paciente.php');
$paciente = new Paciente();
$citas =  $paciente->citas($_SESSION['paciente']);


?>