<?php
error_reporting(~E_ALL);
session_start();
 $empresa=$_SESSION['empresa'];
$k=$_SESSION['dep'];
$piv=0;
$total=0;
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT *,(SELECT nombre from departamento$empresa where pk_d_id=$k) as nomb FROM usuario$empresa where fk_dep=$k");//



  $sql3 =$mysqli->query( "SELECT nombre from departamento$empresa where pk_d_id=$k");//para asignarle el nombre del departamento
	$f3 = $sql3->fetch_object();//^


  $hol="";
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fo = $sq->fetch_object();
if($fo->permiso=='Administrador'){
    echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li class='active'><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
 <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
 <li><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Historial 
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='usuarios_agregados.php'>Empleados Nuevos</a>
          <a class='dropdown-item' href='usuarios_eliminados.php'>Empleados Eliminados</a>
      </li>  
 

 <li><a href='Respaldo.php' >  &nbsp; Respaldo de la empresa&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";
}else if($fo->permiso=='Encargado' || $fo->permiso=='Co-Administrador'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li class='active'><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
  <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
   <li><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>
     <div>
      <p class = 'navbar-text navbar-right'>
         Bienvenido. 
         <a href = 'perfilAdmin.html' class = 'navbar-link'>$f->nombre</a>
      </p>
   </div>
  </div>
</nav>";}
else{
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>
";
if($fo->permiso=='Co-encargado'){echo"<li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}else{
echo"<li><a href='trabajos_generales.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}echo"
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li class='active'><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>
     <div>
      <p class = 'navbar-text navbar-right'>
         Bienvenido. 
         <a href = 'perfilAdmin.html' class = 'navbar-link'>$f->nombre</a>
      </p>
   </div>
  </div>
</nav>";
}

for($i=0;$f = $sql->fetch_object();$i++){
	$sql2 =$mysqli->query( "SELECT fk_usuario,permiso FROM rol$empresa where fk_usuario='$f->id_empleado' ");
	$f2 = $sql2->fetch_object();

	$sq =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario='$f->id_empleado'");//selecciona todos los trabajos del usuario en especifico
  
for ($o=0; $cuenta = $sq->fetch_object(); $o++) { 
$squ =$mysqli->query( "SELECT  AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$cuenta->fk_trabajo'");
   $pro = $squ->fetch_object();
if ($cuenta->Estado=='Entregado' || $cuenta->Estado=='') {
   $total=$total+$pro->calificacion;
   $piv++;
 }
}
$total=$total/$piv;
if ($f2->permiso=="") {
 $f2->permiso="Empleado";
}


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
<b><u>Puntuacion</b></u>:$total

</div><div class='grid-item'>

<button id='$f->id_empleado' onclick='myFuncion($f->id_empleado)' type='button'>Ver gr&aacute;ficas del empleado</button>



</div> </div> <hr2></hr2>
";
$total=0;
$piv=0;
}
echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estas son las gr&aacute;ficas del departamento: $f3->nombre</b></span><b style='font-size: 24px;'>!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='graficas_presa.html'>volver</a></b></p>
<hr2></hr2>";
echo $hol;
?>