<?php 
require_once("./Models/Doctor.php");
$doc = new Doctor();
$todos_doc = $doc->ver_doctores();



?>