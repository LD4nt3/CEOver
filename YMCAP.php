<?php
session_start();
$empresa=$_SESSION['empresa'];
$us=$_SESSION['id_empleado'];
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$mod=0;
$eli=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==2 && $fol->activado==1){$comeback=1;}

}
$squl2 =$mysqli->query( "SELECT * FROM rol$empresa");

for($ll=0;$folo= $squl2->fetch_object(); $ll++){
    if($folo->fk_usuario==$us ){$come=$folo->permiso;}

}
if($comeback==0){
    echo $come;
}else{echo $comeback;}


?>