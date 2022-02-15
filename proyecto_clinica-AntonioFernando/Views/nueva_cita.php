<div style="margin-left: 2vh; background-color: lightblue; width: 200vh;padding-left: 2vh; border-radius: 10px;">

<form action="./Controllers/nueva_cita.php" method="POST">

<p><h1>Crear cita</h1></p>

<p><h4>Doctor: </h4> 
<select name="doctor" id="doctor">
    <?php require_once('seleccionar_doc.php'); ?>
</select>    </p>
<p><h4>Fecha</h4> <input type="date" name="fecha" id="fecha"></p>
<p><h4>Hora</h4> <input type="time" name="hora" id="hora"></p>
<p><input type="submit" value="Confirmar"> <input type="reset" value="Limpiar"></p>
<?php
include("correo.php");
?>
</form>
</div>