<?php
namespace View;

class CitasView{
    function __construct()
    {
        
    }
    function displayError($msg){
        print('<p>Error: '.$msg.'</p>');
    }

    function mostrarMsg($msg){
        print('<h4>'.$msg.'</h4>');
    }

    function mostrCitas($citas){
        echo '<table><tr><td>Fecha</td><td>Hora</td><td>Doctor</td><td>Especialidad</td><td>Acciones</td></tr>';
        foreach($citas as $c){
            echo "<tr><td>".$c['fecha']."</td><td>".$c['hora']."</td><td>".$c['nombre'].' '.$c['apellidos']."</td><td>".$c['especialidad']."</td><td><a href='index.php?controllador=Controller\CitasController&accion=delete&id=".$c['id']."'>Borrar</a></td></tr>";
        }
        echo '</table>';
    }

    function mostrAdmCitas($citas){
        echo '<table><tr><td>Paciente</td><td>Fecha</td><td>Hora</td><td>Doctor</td><td>Especialidad</td><td>Acciones</td></tr>';
        foreach($citas as $c){
            echo "<tr><td>".$c['Pnombre'].' '.$c['Papellidos']."</td><td>".$c['fecha']."</td><td>".$c['hora']."</td><td>".$c['nombre'].' '.$c['apellidos']."</td><td>".$c['especialidad']."</td><td><a href='index.php?controllador=Controller\CitasController&accion=deleteAdm&id=".$c['id']."'>Borrar</a></td></tr>";
        }
        echo '</table>';
    }

    function showAdmForm($data){
        print(
            "<fieldset>
            <legend>Citación</legend>
            <form method='post' action='index.php?controllador=Controller\CitasController&accion=crearAdmCita'>
            <label>Hora</label>
            <input type='time' name='tiempo'><br>
            <label>Fecha</label>
            <input type='date' name='fecha'><br>
            <label>Paciente</label>
            <select name='paciente'>");
        foreach($data['pacientes'] as $p){
            if ($p['alta']){
                print(
                    '<option value="'.$p['id'].'">'.$p['nombre'].' '.$p['apellidos'].'</option>'
                );
            }
        }
        print(
            "</select>
            <br>
            <label>Doctor</label>
            <select name='doctor'>");
            foreach($data['doctores'] as $d){
                if ($d['alta']){
                    print(
                        '<option value="'.$d['id'].'">'.$d['nombre'].' '.$d['apellidos'].', '.$d['especialidad'].'</option>'
                    );
                }
            }
        print(
        "</select><br>
        <input type='submit'>
        </form>
        </fieldset>"
        );
    }

    function showForm($data){
        print(
            "<fieldset>
            <legend>Citación</legend>
            <form method='post' action='index.php?controllador=Controller\CitasController&accion=crearCita'>
            <label>Hora</label>
            <input type='time' name='tiempo'><br>
            <label>Fecha</label>
            <input type='date' name='fecha'><br>
            <label>Doctor</label>
            <select name='doctor'>");
            foreach($data['doctores'] as $d){
                if ($d['alta']){
                    print(
                        '<option value="'.$d['id'].'">'.$d['nombre'].' '.$d['apellidos'].', '.$d['especialidad'].'</option>'
                    );
                }
            }
        print(
        "</select><br>
        <input type='submit'>
        </form>
        </fieldset>"
        );
    }
};
?>