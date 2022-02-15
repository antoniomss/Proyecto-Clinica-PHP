<?php 
require_once("./Controllers/elegir_doc_nueva_cita.php");
foreach ($todos_doc as $doctor) {
    echo  '<option value="'.$doctor[1].'">'.$doctor[1].'</option>' ; 
}


?>