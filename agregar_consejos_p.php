<?php 
session_start();
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$consejo=$_POST["consejo"];
$union=$_POST["union"];

$empresa=$_SESSION['empresa'];
  $sql =$mysqli->query( "INSERT INTO consejo$empresa(consejo,fk_punto) VALUES  ('".$consejo."','".$union."')");

 ?>
