<div style="margin-left: 2vh; background-color: lightblue; width: 200vh;padding-left: 2vh; border-radius: 10px;">
<form class="caja" method="POST" action="./Controllers/validar_nuevo_usuario.php">

    <p class="centrado">Registrar usuario</p>
    <p>
        <label for="nombre_nuevo">Nombre</label>
        <input type="text" id="nombre_nuevo" name="nombre_nuevo">
    </p>

    <p>
        <label for="apellidos_nuevos">Apellidos</label>
        <input type="text" id="apellidos_nuevos" name="apellidos_nuevos">
    </p>

    <p>
        <label for="email_nuevo">Email</label>
        <input type="text" id="email_nuevo" name="email_nuevo">
    </p>

    <p>
        <label for="contraseña_nueva">Contraseña</label>
        <input type="password" id="contraseña_nueva" name="contraseña_nueva">

    </p>
    <p><input type="submit" value="Registrar" id="registrar_nuevo"> <input type="reset" value="Limpiar" id="limpiar_nuevo"></p>

</form>
</div>