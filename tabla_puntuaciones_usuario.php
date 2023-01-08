<?php
error_reporting(~E_ALL);
session_start();
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
 $empresa=$_SESSION['empresa'];
 $rara=0;
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
  <li class='active'><a href='tabla_puntuaciones_usuario.html' > Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
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
}else if($fo->permiso=='Encargado'|| $fo->permiso=='Co-Administrador'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li class='active'><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
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
  <li class='active'><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
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
}echo"
<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Puntuaciones m&aacute;s altas del mes</b></span><b style='font-size: 24px;'>!</b></p><hr2></hr2>";
$sql4 =$mysqli->query( "SELECT *,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as emp,(Select fk_dep from usuario$empresa where id_empleado=fk_usuario) as dep from puntuacion$empresa ");//
for ($i=0; $f4 = $sql4->fetch_object(); $i++) {
   
	$sql5 =$mysqli->query( "SELECT * from departamento$empresa where pk_d_id='$f4->dep' ");//
	echo "<div class='grid-container'>";
$f5 = $sql5->fetch_object();
echo "
<div class='grid-item'>

<div style='text-align: center;'><span style='font-size: 22px;'>¡Puntuaci&oacute;n M&aacute;xima del mes!</span></div>

<div style='text-align: center;'><span style='font-size: 22px;'>Trabajador: $f4->emp <br />Departamento: $f5->nombre </span></div>

<div style='text-align: center;'><span style='font-size: 22px;'>Puntuaci&oacute;n: $f4->calificacion </span></div>
</div>


";
$rara=1;
}
echo "</div>";
if($fo->permiso=='Administrador' || $fo->permiso=='Encargado'){
       if($rara!=0){
    	$s =$mysqli->query( "SELECT * from puntuacion$empresa where id_lugares=1 ");//
$o = $s->fetch_object();

echo"<form action='recompensa.php' method='POST'>
<div><b><u>Recompensa:</b></u><br><br><br><textarea name='reco' rows='3' cols='30'>$o->recompensa</textarea>
  <br>
  <input type='submit' value='Cambiar'>
</form>";}else{echo"<div align='center'><h2><b><u>No se ha registrado ninguna puntuaci&oacute;n</b></u></h2></div>";}  }

  if($fo->permiso=='Co-Administrador'){
         if($rara!=0){
    	$s =$mysqli->query( "SELECT * from puntuacion$empresa where id_lugares=1 ");//
$o = $s->fetch_object();
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==6 && $fol->activado==1){$comeback=1;}

}
 if($comeback==1){echo"<form action='recompensa.php' method='POST'>
<div><b><u>Recompensa:</b></u><br><br><br><textarea name='reco' rows='3' cols='30'>$o->recompensa</textarea>
  <br>
  <input type='submit' value='Cambiar'>
</form>";}
         }else{echo"<div align='center'><h2><b><u>No se ha registrado ninguna puntuaci&oacute;n</b></u></h2></div>";}  
  }

?>