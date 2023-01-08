<?php 
session_start();
 $empresa=$_SESSION['empresa'];

$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$id=$_SESSION['id_empleado'];
//$nom=$_POST["nombre"];
$dom=$_POST["domicilio"];
$apm=$_POST["apem"];
$cell=$_POST["cel"];
$app=$_POST["apep"];
$mail=$_POST["correo"];
if($_POST["pass2"]!==""){
    
    $contra=$_POST["pass2"];
$passw=password_hash($contra, PASSWORD_BCRYPT);

$mysqli->query("UPDATE usuario$empresa SET 
            celular=$cell, domicilio='$dom', correo='$mail', apellido_m='$apm', apellido_p='$app', pass='$passw' WHERE id_empleado='$id'");
}
else
{
$mysqli->query("UPDATE usuario$empresa SET 
            celular=$cell, domicilio='$dom', correo='$mail', apellido_m='$apm', apellido_p='$app' WHERE id_empleado='$id'");
}
    header("location: perfilAdmin.html");

 ?>
