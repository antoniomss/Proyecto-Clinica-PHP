<?php
require_once('./../Models/BaseDatos.php');




$nombre_nuevo = $_POST['nombre_nuevo'];
$apellidos_nuevos = $_POST['apellidos_nuevos'];
$email_nuevo = $_POST['email_nuevo'];
$contraseña_nueva = $_POST['contraseña_nueva'];


$bd= new BaseDatos();
$bd->nuevo_usuario($nombre_nuevo,$apellidos_nuevos,$email_nuevo,$contraseña_nueva);



?>