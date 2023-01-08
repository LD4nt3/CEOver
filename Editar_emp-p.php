<?php 
session_start();
 $empresa=$_SESSION['empresa'];
 if(!isset( $_POST["edita"])){
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$id=$_SESSION['us'];
$nom=$_POST["nombre"];
$dom=$_POST["domicilio"];
$apm=$_POST["apem"];
$cell=$_POST["cel"];
//$comperm=$_POST["permi"]; no borrar admin ni permisos
$app=$_POST["apep"];
$mail=$_POST["correo"];

$dep=$_POST["depas"];
$nD=$mysqli->query( "SELECT fk_dep,(SELECT count(permiso) from rol$empresa where fk_usuario='$id' AND permiso = 'Encargado') as per ,(SELECT count(permiso) from rol$empresa where fk_usuario='$id' AND permiso = 'Co-Encargado') as per2 from usuario$empresa  where id_empleado='$id'");

 for($i=0;$f = $nD->fetch_object();$i++){ 
      echo $f->fk_dep."asdad";
if ($dep!=$f->fk_dep && (($f->per >0)||($f->per2 >0)))
 $mysqli->query( "DELETE FROM rol$empresa WHERE fk_usuario='$id' and permiso = 'Encargado' OR permiso = 'Co-Encargado'  ");

if($i==0){
$mysqli->query("UPDATE usuario$empresa SET nombre='$nom',
            celular=$cell, domicilio='$dom', correo='$mail', apellido_m='$apm', apellido_p='$app', fk_dep=$dep WHERE id_empleado='$id'");


}
  }
    header("location:Editar_emp.php");
}
else
  header("location:Editar_permisos.php");
 ?>
