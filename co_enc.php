<?php 
session_start();
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$val=$_POST['id'];

     $co =$mysqli->query( "SELECT * from rol$empresa  where fk_usuario='".$_POST['id']."'");
       $cuenta = $co->fetch_object();
       $jo="Co-encargado";
       echo $_POST['id'];
if($cuenta==""){ $sql2 = "INSERT INTO rol$empresa(permiso,fk_usuario) VALUES  ('".$jo."','".$_POST["id"]."')";
       mysqli_query($mysqli,$sql2);}else{ $sql2 = "INSERT INTO rol$empresa(permiso,fk_usuario) VALUES  ('".$jo."','".$_POST["id"]."')";
       mysqli_query($mysqli,$sql2);}


 ?>