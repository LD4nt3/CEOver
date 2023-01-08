<?php
session_start();
$us=$_SESSION['id_empleado'];
$empresa=$_SESSION['empresa'];
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$mod=0;
$eli=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==3 && $fol->activado==1){$comeback=1;}

}
echo $comeback;

?>