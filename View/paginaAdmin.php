<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Clinica
        </title>
        <meta charset="UTF-8" http-equiv="content-type" content="text/html">
        <link rel="stylesheet" media="screen" type="text/css" href="estilos.css" >
        <!-- <link rel="stylesheet" media="screen" type="text/css" href="estilos4.css" > -->
        <!-- <link rel="stylesheet" media="screen" type="text/css" href="estilos5.css" > -->
        <script src=""></script>
    </head>
    <body>
        <div class="login">
            <a id="primerBoton" href="index.php?controllador=Controller\DoctorController&accion=mostrarAdmDoctor">Ver todos los doctores</a>
            <a id="boton" href="index.php?controllador=Controller\RegisterController&accion=registro">Registrar paciente</a>
            <a id="boton" href="index.php?controllador=Controller\PacienteController&accion=mostrarAdmPaciente">Ver todos los pacientes</a>
            <a id="boton" href="index.php?controllador=Controller\CitasController&accion=mostrarAdmCitas">Ver todas las citas</a>
            <a id="boton" href="index.php?controllador=Controller\CitasController&accion=prepAdmForm">Crear Cita</a>
            <a id="boton" href="index.php?controllador=Controller\DoctorController&accion=createAdmDoctor">Registrar Doctor</a>
            <a id="boton" href="index.php?controllador=Controller\LoginController&accion=logout">Logout</a>
        </div>
        <div>
            <!-- <fieldset>
                <legend>Registro paciente</legend>
            <form method="post" action="index.php?controllador=Controller\RegisterController&accion=registro">
                <label>Nombre</label>
                <input name='nombre'><br>
                <label>Apellidos</label>
                <input name='apellidos'><br>
                <label>email</label>
                <input type='email' name='mail'><br>
                <label>contraseña</label>
                <input type='password' name='cont'><br>
                <input type="submit">
            </form>
            </fieldset> -->
        </div>
      <hr>
</body>
