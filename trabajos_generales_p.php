<?php
session_start(); 
 
$empresa=$_SESSION['empresa'];
$mes= date("m");
$anio=date("Y");
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
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

  <li class='active'><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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
}else if($fo->permiso=='Encargado'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li class='active'><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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

  <li class='active'><a href='trabajos_generales.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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
$sql =$mysqli->query(  "SELECT (Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo,(Select archivo from trabajo$empresa where id_trabajo=fk_trabajo) as archivo,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as empleado,(Select fk_dep from usuario$empresa where id_empleado=fk_usuario) as dep,estado,tiempo_i,hora_i,hora_f,tiempo_f,observaciones,version,calificado from tiempo$empresa ");
$sql2 =$mysqli->query(  "SELECT fk_dep from usuario$empresa where id_empleado='$us'");
$f2 = $sql2->fetch_object();
echo"

<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estos son todos los trabajos de tu departamento</b></span><b style='font-size: 24px;'>!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><a href='trabajos_individuales.html' style='background-color: rgb(238, 238, 238); font-family: tahoma, geneva, sans-serif; text-align: center;'><span style='background-color: rgb(173, 216, 230);'>Ver tus trabajos</span></a></p>
<hr2></hr2><div class='grid-container'>";


	

for($i=0;$f = $sql->fetch_object();$i++){
	$mesA=substr($f->tiempo_f,5,-3);
	$Anio=substr($f->tiempo_f,0,-6);

if ( $mes<=$mesA && $Anio==$anio ) {
if($f->dep==$f2->fk_dep){


echo "


<div class='grid-item'>

<p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img height='107' src='https://languages.opensuse.org/images/8/84/Icon-merge.png' width='107' />$f->archivo</p>

<p style='margin-left: 80px;'><span style='font-family: &quot;lucida sans unicode&quot;, &quot;lucida grande&quot;, sans-serif;'><b>Empleado: </b>$f->empleado</span><br />
<b>Trabajo: </b>$f->trabajo<br/>
<span style='font-family: &quot;courier new&quot;, courier, monospace;'><b>Estado del trabajo:</b> $f->estado</span></p>

<p style='margin-left: 80px;'><b>Fecha de inicio:&nbsp; &nbsp; </b> <input id='user_date' name='user_date' type='date' value='$f->tiempo_i' disabled /> <b><u>Hora inicial</b></u>:$f->hora_i
<br/><b>Fecha de entrega:</b><input id='user_date' name='user_date' type='date' value='$f->tiempo_f' disabled  /> <b><u>Hora Final</b></u>:$f->hora_f<br><b>Observaciones:</b><br> $f->observaciones<br><b>Calificado por:</b><br> $f->calificado<br><b>Version del trabajo:</b> $f->version</p></p>


";



echo "</div>";


}}}

?>