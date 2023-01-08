<?php
session_start();
$us=$_SESSION['id_empleado'];
$empresa=$_SESSION['empresa'];
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$squl =$mysqli->query( "SELECT * FROM rol$empresa");

$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->fk_usuario==$us ){$comeback=$fol->permiso;}

}
echo $comeback;
?>