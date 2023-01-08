<?php
session_start();
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
 $empresa=$_SESSION['empresa'];
  $sql =$mysqli->query( "SELECT * FROM departamento$empresa  where nombre!='Administracion'");
$piv=0;
$total=0;
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
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

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
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li ><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
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
  <li ><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
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

<button id='$f->pk_d_id' onclick='myFuncion($f->pk_d_id)' type='button'>Ver gr&aacute;ficas del departamento.</button>



</div> </div> <hr2></hr2>
";
$total=0;
$piv=0;
}
if($fo->permiso=='Administrador'){
echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estas son las gr&aacute;ficas de todos los departamentos</b></span><b style='font-size: 24px;'>!&nbsp;</b> <a href='consejos.php'> Ver consejos </a></p>
<hr2></hr2>";}else{echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estas son las gr&aacute;ficas de todos los departamentos</b></span><b style='font-size: 24px;'>!&nbsp;</b></p>
<hr2></hr2>";}
echo $hol;
?>