<?php


class Paciente
{
    function __construct(
        public  $servidor = "127.0.0.1",
        public  $usuario = "root",
        public  $pass = "",
        public  $nombre_bd = "clinica",
    ) {
    }
    public function extraer_info()
    {
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo)
    {
        $this->correo = $correo;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function micuenta($correo)
    {
        $con = new mysqli($this->servidor, "root", "", $this->nombre_bd);
        $query = "SELECT * FROM pacientes WHERE correo='$correo'";
        $result = mysqli_query($con, $query);
        $cuenta =   mysqli_fetch_all($result);
        return $cuenta;
    }
    public function citas($correo_paciente)
    {
        $con = new mysqli($this->servidor, "root", "", $this->nombre_bd);
        $query = "select pacientes.nombre,doctores.nombre,citas.fecha,citas.hora,citas.id from citas,doctores,pacientes where citas.paciente_id = pacientes.id and citas.doctor_id = doctores.id and pacientes.correo ='$correo_paciente'";
        $result = mysqli_query($con, $query);
        $citas =   mysqli_fetch_all($result);
        return $citas;
    }
    public function nueva_cita($id_doctor, $fecha, $hora)
    {
        session_start();
        $con = new mysqli($this->servidor, "root", "", $this->nombre_bd);
        $id_paciente = $this->micuenta($_SESSION['paciente'])[0][0];
        $query = "INSERT INTO citas VALUES(null,'$id_paciente','$id_doctor','$fecha','$hora')";
        mysqli_query($con, $query);
        header('Location: ./../index.php?pag=4');
    }
    public function borrar_cita($id_cita)
    {
        $con = new mysqli($this->servidor, "root", "", $this->nombre_bd);
        $query = "DELETE FROM citas WHERE id='$id_cita'";
        $con->query($query);
        header('Location: ./../index.php?pag=4');
    }
 
}
