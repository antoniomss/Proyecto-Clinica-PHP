<div class="tabla_doctores">
    <h1>Lista de doctores</h1>
    <table>
        <tr>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Telefono</td>
            <td>Especialidad</td>
        </tr>
        <?php
        require_once('./Controllers/ver_doctores.php');
        foreach ($fila as $doctor) {
            echo "<tr><td>" . $doctor[1] . "</td><td>" . $doctor[2] . "</td><td>" . $doctor[3] . "</td><td>" . $doctor[4] . "</td></tr>";
        }?>
    </table>

</div>