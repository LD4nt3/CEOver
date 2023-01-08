<?php
session_start();
error_reporting(~E_ALL);
 $empresa=$_SESSION['empresa'];
$piv=0;
$total=0;
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT *,(SELECT nombre from departamento$empresa where pk_d_id=fk_dep) as nomb FROM usuario$empresa ");//
$c =$mysqli->query( "SELECT * from vistas$empresa");//

for($i=0;$jj = $c->fetch_object();$i++){
    if($jj->pk_vista==1){$mejores=$jj->activado;}
    if($jj->pk_vista==2){$peores=$jj->activado;}
    if($jj->pk_vista==3){$trabajos=$jj->activado;}
    if($jj->pk_vista==4){$EDM=$jj->activado;}
}


  $hol="";


for($i=0;$f = $sql->fetch_object();$i++){
  $sql2 =$mysqli->query( "SELECT fk_usuario,permiso FROM rol$empresa where fk_usuario='$f->id_empleado' ");
  $f2 = $sql2->fetch_object();

  $sq =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario='$f->id_empleado'");//selecciona todos los trabajos del usuario en especifico
  
for ($o=0; $cuenta = $sq->fetch_object(); $o++) { 

$squ =$mysqli->query( "SELECT  AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$cuenta->fk_trabajo'");
   $pro = $squ->fetch_object();
   if ($cuenta->Estado=='Entregado') {

   $total=$total+$pro->calificacion;
   $piv++;


}
}
$total=$total/$piv;
if ($f2->permiso=="") {
 $f2->permiso="Empleado";
}


if ($total!=0 && $total>4.0 && $mejores==1) {
  $hol=$hol." 
<br>
<div class='grid-container'>

<div class='grid-item'>
<div id='piechart$i' style='width: 300px; height: 300px;'></div></div>

<div class='grid-item'>
<b><u>Empleado</b></u>: $f->nombre $f->apellido_p $f->apellido_m <br>
<b><u>Puesto</b></u>: $f2->permiso <br>
<b><u>Tel&eacute;fono</b></u>: $f->celular<br>
<b><u>Domicilio</b></u>: $f->domicilio <br>
<b><u>Puntuaci&oacute;n</b></u>:$total

</div> </div> <hr2></hr2>
";
}

if ($total!=0 && $total<2.7 && $peores==1) {
  $holo=$holo." 
<br>
<div class='grid-container'>

<div class='grid-item'>
<div id='piechart$i' style='width: 300px; height: 300px;'></div></div>

<div class='grid-item'>
<b><u>Empleado</b></u>: $f->nombre $f->apellido_p $f->apellido_m <br>
<b><u>Puesto</b></u>: $f2->permiso <br>
<b><u>Tel&eacute;fono</b></u>: $f->celular<br>
<b><u>Domicilio</b></u>: $f->domicilio <br>
<b><u>Puntuaci&oacute;n</b></u>:$total

</div> </div> <hr2></hr2>
";
}

 

$total=0;
$piv=0;
}

echo $hol.$holo;
?>