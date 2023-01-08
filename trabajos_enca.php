<?php
session_start(); 
 $empresa=$_SESSION['empresa'];
$mes=date("m");
$anio=date("Y");
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$sql =$mysqli->query(  "SELECT (Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo,(Select id_trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo2,(Select archivo from trabajo$empresa where id_trabajo=fk_trabajo) as archivo,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as empleado,(Select id_empleado from usuario$empresa where id_empleado=fk_usuario) as empleado2,estado,tiempo_i,hora_i,hora_f,tiempo_f,observaciones,version,calificado from tiempo$empresa ");
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$combel=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==3 && $fol->activado==1){$comback=1;}
    if($fol->pk_perm==8 && $fol->activado==1){$combel=1;}
}
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
}else if($fo->permiso=='Encargado' || $fo->permiso=='Co-Administrador'){
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
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
  <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
   <li><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>
 
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
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";
}

if($fo->permiso=='Administrador' || $fo->permiso=='Encargado' ){echo"<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estos son todos los trabajos que asignaste en este mes</b></span><b style='font-size: 24px;'>!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><a href='subir_archivo_enc.html' style='font-family: tahoma, geneva, sans-serif; text-align: center;'><span></span>Subir un nuevo trabajo</a>Elige tu filtro <select id='item' name='item' onchange='hol()'><option value='todos'>Todos los trabajos</option><option value='tu'>Tus trabajos</option><option value='co'>Co-encargados</option></select></p>
";} else if($comback==1){
echo"<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estos son todos los trabajos que asignaste en este mes</b></span><b style='font-size: 24px;'>!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><a href='subir_archivo_enc.html' style=' font-family: tahoma, geneva, sans-serif; text-align: center;'><span 	></span>Subir un nuevo trabajo</a>Elige tu filtro <select id='item' name='item' onchange='hol()'><option value='todos'>Todos los trabajos</option><option value='tu'>Tus trabajos</option><option value='co'>Co-encargados</option></select></p>
";
}else{echo"<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estos son todos los trabajos que asignaste en este mes</b></span><b style='font-size: 24px;'>!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b> Elige tu filtro <select id='item' name='item' onchange='hol()'><option value='todos'>Todos los trabajos</option><option value='tu'>Tus trabajos</option><option value='co'>Co-encargados</option></select></p>
";}
if($fo->permiso=='Co-encargado'){echo "<div align='center'><a href='trabajos_individuales.html'>Tus asignaciones </a></div>";}
?>