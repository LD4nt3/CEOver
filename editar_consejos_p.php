<?php 
session_start();
$id=$_SESSION['auxi'];
$consejo=$_POST["consejo"];
$union=$_POST["union"];
$empresa=$_SESSION['empresa'];

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");$mysqli->set_charset("utf8");

 
$mysqli->query("UPDATE consejo$empresa SET consejo='$consejo',fk_punto='$union' WHERE id_consejo='$id'");
 ?>
