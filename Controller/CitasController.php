<?php
namespace Controller;
use Models\Citas;
use View\CitasView;
use Controller\BaseController;

use Lib\DataBase;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PDO;

require 'vendor/autoload.php';

class CitasController extends BaseController{
    function __construct(){
        $this->model = new Citas;
        $this->view = new CitasView;
    }
    
    function mostrarCitas(){
        $this->chckRol('paciente');
        $citas = $this->model->consulCitas($_SESSION['userdata']['id']);
        $this->view->mostrCitas($citas);
    }

    function mostrarAdmCitas(){
        $this->chckRol('administrador');
        $citas = $this->model->consulCitas();
        $this->view->mostrAdmCitas($citas);
    }

    function delete(){
        $this->chckRol('paciente');
        $this->model->deleteCita($_GET['id']);
        $this->mostrarCitas();
    }

    function deleteAdm(){
        $this->chckRol('administrador');
        $this->model->deleteCita($_GET['id']);
        $this->mostrarAdmCitas();
    }

    function prepAdmForm(){
        $this->chckRol('administrador');
        $data = $this->model->Consuldet();
        $this->view->showAdmForm($data);
    }

    function prepForm(){
        $this->chckRol('paciente');
        $data = $this->model->Consuldet();
        $this->view->showForm($data);
    }

    function crearAdmCita(){
        $this->chckRol('administrador');
        $data=[];
        if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
            $data[':fecha'] = filter_var($_POST['fecha'],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['tiempo']) && !empty($_POST['tiempo'])){
            $data[':tiempo'] = filter_var($_POST['tiempo'],FILTER_SANITIZE_SPECIAL_CHARS);
        }if(isset($_POST['paciente']) && !empty($_POST['paciente'] && filter_var($_POST['paciente'],FILTER_VALIDATE_INT))){
            $data[':paciente'] = filter_var($_POST['paciente'],FILTER_SANITIZE_NUMBER_INT);
        }if(isset($_POST['doctor']) && !empty($_POST['doctor'] && filter_var($_POST['doctor'],FILTER_VALIDATE_INT))){
            $data[':doctor'] = filter_var($_POST['doctor'],FILTER_SANITIZE_NUMBER_INT);
        }if(count($data) < 4){
            $this->view->displayError('Registrando Cita');
        }else{
            $this->model->insertCita($data);
            $this->mostrarCitas();
        }


    }

    function crearCita(){
        $this->chckRol('paciente');
        $data=[];
        if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
            $data[':fecha'] = filter_var($_POST['fecha'],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['tiempo']) && !empty($_POST['tiempo'])){
            $data[':tiempo'] = filter_var($_POST['tiempo'],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['doctor']) && !empty($_POST['doctor'] && filter_var($_POST['doctor'],FILTER_VALIDATE_INT))){
            $data[':doctor'] = filter_var($_POST['doctor'],FILTER_SANITIZE_NUMBER_INT);

        }if(count($data) < 3){
            $this->view->displayError('Registrando Cita');
        }else{
            $data[':paciente']=$_SESSION['userdata']['id'];
            $this->model->insertCita($data);
            $this->enviarMail($_SESSION['userdata'], $data);
            $this->mostrarCitas();
        }
    }

    function enviarMail($usuario, $datos){
        $mail = new PHPMailer();
        $mail-> isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.office365.com';                 
        $mail->Port = 587;
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->SMTPSecure = 'STARTTLS';            //Enable implicit TLS encryption
        $mail->Username   = 'clinicaSteamulation@hotmail.com';                     //SMTP username
        $mail->Password   = 'miclinica1234';                               //SMTP password
        $mail->setFrom('clinicaSteamulation@hotmail.com');
        $mail->addAddress($usuario['correo']);     //Add a recipient
        $mail->Subject = 'Confirmación de su cita con la clínica Steamulation';
        $mensaje = 
        "Estimado/a,  ".$usuario['nombre']." ".$usuario['apellidos'].", usted ha solicitado una cita. <br>
        Los datos de la cita son: <br>
        <table style='border 1px solid black'>
        <tr>
            <th>Paciente</th>
            <th>Doctor</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
        <tr>
            <td>".$usuario['nombre']." ".$usuario['apellidos']."</td>
            <td>".$datos[':doctor']."</td>
            <td>".$datos[':fecha']."</td>
            <td>".$datos[':tiempo']."</td>
        </tr>
        </table><br>";
        $mail->Body = $mensaje;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        if (!$mail->send()){
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            die();
        } else {
            echo 'Se le ha enviado un correo con los datos de la cita.';
        }
        
    }
    
    
}
?>
