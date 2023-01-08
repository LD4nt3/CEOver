<?php
error_reporting(~E_ALL);
session_start();
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
 $empresa=$_SESSION['empresa'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fo = $sq->fetch_object();
echo"
<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Puntuaciones m&aacute;s altas del mes</b></span><b style='font-size: 24px;'>!</b></p><hr2></hr2>";
$sql4 =$mysqli->query( "SELECT *,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as emp,(Select fk_dep from usuario$empresa where id_empleado=fk_usuario) as dep from puntuacion$empresa ");//
for ($i=0; $f4 = $sql4->fetch_object(); $i++) { 
	$sql5 =$mysqli->query( "SELECT * from departamento$empresa where pk_d_id='$f4->dep' ");//

$f5 = $sql5->fetch_object();
echo "

<br>
<div style='text-align: center;'><span style='font-size: 22px;'>¡Puntuaci&oacute;n M&aacute;xima del mes!</span></div>

<div style='text-align: center;'><span style='font-size: 22px;'>Trabajador: $f4->emp <br />Departamento: $f5->nombre </span></div>

<div style='text-align: center;'><span style='font-size: 22px;'>Puntuaci&oacute;n: $f4->calificacion </span></div>

<hr2></hr2>
<br>
";

}

if($fo->permiso=='Administrador' || $fo->permiso=='Encargado'){
    	$s =$mysqli->query( "SELECT * from puntuacion$empresa where id_lugares=1 ");//
$o = $s->fetch_object();

echo"<form  >
<div style='text-align: center;'><b><u>Recompensa:</b></u><br><br><br><textarea name='reco' id='reco' rows='3' cols='30'>$o->recompensa</textarea>
  <br>
  <button onclick='hola()'>Cambiar</button>
</form>";}

  if($fo->permiso=='Co-Administrador'){
    	$s =$mysqli->query( "SELECT * from puntuacion$empresa where id_lugares=1 ");//
$o = $s->fetch_object();
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==6 && $fol->activado==1){$comeback=1;}

}
 if($comeback==1){echo"<form id='myform' >
<div style='text-align: center;'><b><u>Recompensa:</b></u><br><br><br><textarea name='reco' id='reco' rows='3' cols='30'>$o->recompensa</textarea>
  <br>
  <input type='submit' value='Cambiar'>
</form>";}
      
  }

?>