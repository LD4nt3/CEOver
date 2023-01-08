<?php
session_start();
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
 $empresa=$_SESSION['empresa'];
  $sql =$mysqli->query( "SELECT * FROM departamento$empresa");
$piv=0;
$total=0;
  $hol="";
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fo = $sq->fetch_object();

for($i=0;$f = $sql->fetch_object();$i++){

  $sql2 =$mysqli->query( "SELECT * FROM usuario$empresa where fk_dep='$f->pk_d_id'");//
  


for ($h=0; $f2 = $sql2->fetch_object(); $h++) { 
   $sq =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario='$f2->id_empleado'");//selecciona todos los trabajos del usuario en especifico
  


  	for ($o=0; $cuenta = $sq->fetch_object(); $o++) { 
$squ =$mysqli->query( "SELECT  AVG(calificacion) AS calificacion FROM cont$empresa where fk_trabajo='$cuenta->fk_trabajo'");
   $pro = $squ->fetch_object();

   $total=$total+$pro->calificacion;
   $piv++;
}


  }

$total=$total/$piv;



$hol=$hol." 
<br>
<div class='grid-container'>

<div class='grid-item'>
<div id='piechart$i' style='width: 300px; height: 300px;'></div></div>

<div class='grid-item' align='center'>
<b><u>Departamento</b></u>: $f->nombre <br><br><br><br><br><br><br><br><br>
<b><u>Promedio de trabajos del departamento</b></u>: $total

</div><div class='grid-item'>

<button id='$f->pk_d_id' onclick='myFuncion($f->pk_d_id)' type='button'>Ver graficas del departamento.</button>



</div> </div> <hr2></hr2>
";
$total=0;
$piv=0;
}
if($fo->permiso=='Administrador'){
echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estas son las graficas de todos los departamentos</b></span><b style='font-size: 24px;'>!&nbsp;</b> <a href='consejos.php'> Ver consejos </a></p>
<hr2></hr2>";}else{echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estas son las graficas de todos los departamentos</b></span><b style='font-size: 24px;'>!&nbsp;</b></p>
<hr2></hr2>";}
echo $hol;
?>