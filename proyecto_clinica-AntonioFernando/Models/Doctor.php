<?php



class Doctor
{

    function __construct(
  

        public  $servidor = "127.0.0.1",
        public  $usuario = "root",
        public  $pass = "",
        public  $nombre_bd = "clinica",


    ) {
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

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEspecialidad(): string
    {
        return $this->especialidad;
    }
    public function ver_doctores()
    {
        $con = new mysqli($this->servidor, "root", "", $this->nombre_bd);
        $query = "SELECT * FROM doctores";
        $result = mysqli_query($con, $query);
        $fila =   mysqli_fetch_all($result);
    
        return $fila;
    }
    public function obtener_id_doctor($nombre_doctor){
        $con = new mysqli($this->servidor, "root", "", $this->nombre_bd);
        $query = "SELECT doctores.id from citas,doctores where doctores.id = citas.doctor_id and doctores.nombre='$nombre_doctor'";
        $result = mysqli_query($con, $query);
        $id =   mysqli_fetch_all($result);
        return $id;       

    }



    public static function fromArray(array $data): Doctor
    {
        return new Doctor(
            $data['id'],
            $data['nombre'],
            $data['apellidos'],
            $data['telefono'],
            $data['especialidad'],

        );
    }
    
}
