
<div class="registro">
    <form action="controllers/validar_inicio_sesion.php" method="POST">
        <h1>Inicio de sesión</h1>
        <p>Email</p>
        <input id="usuario" name="usuario" type="text" placeholder="Email" require>
        <br>
        <p>Contraseña</p>
        <input id="contraseña" name="password" type="password" placeholder="Contraseña" require>
        <br>
        <input id="enviar" value="Iniciar sesión" type="submit" class="boton_form">
        <a href="./index.php?pag=3"><input type="button" value="Registar Usuario" class="boton_form"></a> <br>


    </form>
</div>