<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="estilos.css"> -->
    <!-- <link rel="stylesheet" href="estilos2.css"> -->
    <!-- <link rel="stylesheet" href="estilos3.css">  -->
    <!-- <link rel="stylesheet" href="estilos4.css"> -->
    <link rel="stylesheet" href="estilos6.css">
    <title>Clinica Steamulation</title>
    
</head>

<body>
    <div class="cabecera">
        <img id="logo" src="https://worldshishas.com/wp-content/uploads/elementor/thumbs/steamulation-ph6km7u5fd3pnldrq4x9m8jxemz6kowoo69twr4hfo.jpg">
         <a href="index.php"><h1 id="titulo" >CLINICA STEAMULATION</h1></a>
    </div>

    <div class="contenido">
        <?php session_start(); ?>

        <div class="login">
            <?php
            if (!isset($_SESSION['paciente'])) {
                require_once('Views/formulario_registro.php');
            } else {
                require_once('Views/paciente_iniciado.php');
            }
            ?>
        </div>

        <?php
        if (isset($_GET['pag'])) {
            if ($_GET['pag'] == 1) {
                require_once('Views/vista_doctores.php');
            } elseif ($_GET['pag'] == 2) {
                require_once('Views/micuenta.php');
            }elseif($_GET['pag']==3){
                require_once('Views/form_registrar_usuario.php');
            }elseif($_GET['pag']==4){
                require_once('Views/ver_citas.php');
            }elseif($_GET['pag']==5){
                require_once('Views/nueva_cita.php');
            }
        } else {
            require_once('Views/sin_iniciar_sesion.php');
        }
        ?>


    </div>
</body>

</html>