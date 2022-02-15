<?php 
require_once('./Models/Paciente.php');
$paciente = new Paciente();
$array = $paciente->micuenta($_SESSION['paciente']);


?>