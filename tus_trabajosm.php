<?php
session_start();
$empresa=$_SESSION['empresa'];
$o=0;
$mes= date("m");
$anio=date("Y");
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 


$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fo = $sq->fetch_object();

$sql =$mysqli->query(  "SELECT (Select id_trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo,(Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo2,(Select archivo from trabajo$empresa where id_trabajo=fk_trabajo) as archivo,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as empleado,estado,tiempo_i,hora_i,hora_f,tiempo_f,observaciones from tiempo$empresa where fk_usuario='$us' ");


echo"

<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estos son tus trabajos</b></span><b style='font-size: 24px;'>!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><a href='trabajos_generales.html' style='background-color: rgb(238, 238, 238); font-family: tahoma, geneva, sans-serif; text-align: center;'><span style='background-color: rgb(173, 216, 230);'>Ver Todos los trabajos</span></a></p>
<hr2></hr2>";


	

for($i=0;$f = $sql->fetch_object();$i++){
    $d=1;
	$mesA=substr($f->tiempo_f,5,-3);
	$Anio=substr($f->tiempo_f,0,-6);

if ( $mes<=$mesA && $Anio==$anio ) {


echo "


<div class='grid-item'>

<p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img height='107' src='https://languages.opensuse.org/images/8/84/Icon-merge.png' width='107' />$f->archivo</p>

<p style='margin-left: 80px;'><span style='font-family: &quot;lucida sans unicode&quot;, &quot;lucida grande&quot;, sans-serif;'><b>Empleado: </b>$f->empleado</span><br />
<b>Trabajo: </b>$f->trabajo2<br/>
<span style='font-family: &quot;courier new&quot;, courier, monospace;'><b>Estado del trabajo:</b> $f->estado</span></p>

<p style='margin-left: 80px;'><b>Fecha de inicio:&nbsp; &nbsp; </b> <input id='user_date' name='user_date' type='date' value='$f->tiempo_i' disabled /><b><u>Hora inicial</b></u>:$f->hora_i
<br/><b>Fecha de entrega:</b><input id='user_date' name='user_date' type='date' value='$f->tiempo_f' disabled  /><b><u>Hora Final</b></u>:$f->hora_f<br><b>Observaciones:</b><br> $f->observaciones</p>


";
    if($f->estado=='Tarde'){
  	    $hi2=$f->trabajo;
    $sql2 =$mysqli->query(  "SELECT * from cont$empresa where fk_trabajo='$hi2' ");
  $f2 = $sql2->fetch_object();
if($f2->fk_trabajo==$hi2){
     $sql3 =$mysqli->query(  "SELECT AVG(calificacion) as calificacion from cont$empresa where fk_trabajo='$hi2' ");
  $f3 = $sql3->fetch_object();
  echo"<div align='center'><br><u>La calificaci&oacute;n de tu trabajo es de </br></u>:$f3->calificacion</div>";
}else{
      echo"<br><u>Tú trabajo aun no ah sido calificado</br></u>";
}
$d=0;
 }
 
 if($d==1){
	if ($f->estado!='Entregado') {
		$hi=$f->trabajo;
echo "<span style='text-align: center; font-family: tahoma, geneva, sans-serif;'><div  id='$hi' value='$hi' nombre='$f->trabajo2'><button type='button' id='$hi' value='$hi' nombre='$f->trabajo2' onclick='hola(this)'>ver trabajo</button></div></span>";
$o++;
	}else{
	    $hi2=$f->trabajo;
    $sql2 =$mysqli->query(  "SELECT * from cont$empresa where fk_trabajo='$hi2' ");
  $f2 = $sql2->fetch_object();
if($f2->fk_trabajo==$hi2){
     $sql3 =$mysqli->query(  "SELECT AVG(calificacion) as calificacion from cont$empresa where fk_trabajo='$hi2' ");
  $f3 = $sql3->fetch_object();
  echo"<div align='center'><br><u>La calificaci&oacute;n de tu trabajo es de </br></u>:$f3->calificacion</div>";
}else{
      echo"<br><u>Tú trabajo aun no ah sido calificado</br></u>";
}
	}

}
 echo "<hr2></hr2>";


}}

?>