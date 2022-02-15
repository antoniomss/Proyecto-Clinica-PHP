<?php 
require_once("./../Models/Doctor.php");
require_once("./../Models/Paciente.php");

$nombre_doctor = $_POST['doctor'];
$fecha = date($_POST['fecha']) ;
$hora = $_POST['hora'];



$doctor = new Doctor();
$id_doctor= $doctor->obtener_id_doctor($nombre_doctor)[0][0];

$paciente = new Paciente();
$nueva_cita = $paciente->nueva_cita($id_doctor,$fecha,$hora) ;





?>