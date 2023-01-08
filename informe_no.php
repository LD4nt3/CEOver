<?php
session_start();
//error_reporting(~E_ALL);

  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
 $empresa=$_SESSION['empresa'];
  
  $sql =$mysqli->query( "SELECT *,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as emp,(Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as tra FROM tiempo$empresa where Estado='No entregado' ");//

$c =$mysqli->query( "SELECT * from vistas$empresa");//

for($i=0;$jj = $c->fetch_object();$i++){
    if($jj->pk_vista==1){$mejores=$jj->activado;}
    if($jj->pk_vista==2){$peores=$jj->activado;}
    if($jj->pk_vista==3){$trabajos=$jj->activado;}
    if($jj->pk_vista==4){$EDM=$jj->activado;}
}

$sql2 =$mysqli->query( "SELECT *,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as emp2,(Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as tra FROM tiempo$empresa where Estado='Con problemas' ");//

$sql3 =$mysqli->query( "SELECT *,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as emp3,(Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as tra FROM tiempo$empresa where Estado='Tarde' ");//

for($i=0;$f = $sql->fetch_object();$i++){
if ( $trabajos==1) {
echo "<p style='margin-left: 240px;'>&nbsp;</p>

<p style=' text-align: center;'><span style='font-size: 20px;'>Trabajo: $f->tra&nbsp; &nbsp; &nbsp;Estado: $f->Estado</span></p>

<p style='margin-left: 80px;'><span style='font-size: 20px;'>Motivo por el cual no se entrego: $f->Observaciones &nbsp; &nbsp; &nbsp;<br />
Empleado: $f->emp<br />
Fecha de inicio: $f->tiempo_i $f->hora_i<br />
Fecha limite: $f->tiempo_f $f->hora_f</span></p><hr2></hr2>
";
}
}

for($g=0;$f2 = $sql2->fetch_object();$g++){
    if ( $trabajos==1) {
echo "<p style='margin-left: 240px;'>&nbsp;</p>

<p style=' text-align: center;'><span style='font-size: 20px;'>Trabajo: $f2->tra&nbsp; &nbsp; &nbsp;Estado: $f2->Estado</span></p>

<p style='margin-left: 80px;'><span style='font-size: 20px;'>Motivo por el cual no se entrego: $f2->Observaciones &nbsp; &nbsp;<br />
Empleado: $f2->emp2<br />
Fecha de inicio: $f2->tiempo_i $f2->hora_i<br />
Fecha limite: $f2->tiempo_f $f2->hora_f</span></p><hr2></hr2>
";
}
}

for($o=0;$f3 = $sql3->fetch_object();$o++){
    if ( $trabajos==1) {
echo "<p style='margin-left: 240px;'>&nbsp;</p>

<p style=' text-align: center;'><span style='font-size: 20px;'>Trabajo: $f3->tra&nbsp; &nbsp; &nbsp;Estado: $f3->Estado</span></p>

<p style='margin-left: 80px;'><span style='font-size: 20px;'>Motivo por el cual no se entrego: $f3->Observaciones &nbsp; &nbsp; &nbsp;<br />
Empleado: $f3->emp3<br />
Fecha de inicio: $f3->tiempo_i $f3->hora_i<br />
Fecha limite: $f3->tiempo_f $f3->hora_f</span></p><hr2></hr2>
";
}
}
$sql4 =$mysqli->query( "SELECT *,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as emp,(Select fk_dep from usuario$empresa where id_empleado=fk_usuario) as dep from puntuacion$empresa ");//
$f4 = $sql4->fetch_object();
$sql5 =$mysqli->query( "SELECT * from departamento$empresa where pk_d_id='$f4->dep' ");//
$f5 = $sql5->fetch_object();
echo"<div></div>";
if ( $EDM==1) {
echo "

<div style='text-align: center;'><span style='font-size: 22px;'>¡Puntuaci&oacute;n M&aacute;xima del mes!</span></div>

<div style='text-align: center;'><span style='font-size: 22px;'>Trabajador;$f4->emp <br />Departamento: $f5->nombre </span></div>

<div style='text-align: center;'><span style='font-size: 22px;'>Puntuaci&oacute;n: $f4->calificacion </span></div>";
}



?>