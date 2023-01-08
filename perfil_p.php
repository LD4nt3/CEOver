<?php 
session_start();
error_reporting(0);
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$us=$_SESSION['id_empleado'];
$empresa=$_SESSION['empresa'];
$sql =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$f = $sql->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$f2 = $sq->fetch_object();
if($f2->permiso=='Administrador'){
    echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li class='active'><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
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
}else if($f2->permiso=='Encargado' || $f2->permiso=='Co-Administrador'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li class='active'><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
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
     
  <li class='active'><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>
";
if($f2->permiso=='Co-encargado'){echo"<li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}else{
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
echo "<hr2></hr2><p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Bienvenido a:</b></span></p>

<p style='text-align: center;'><span style='font-size:24px;'><b>T&uacute; Perfil!</b></span></p>";
/*echo "$f->nombre<br />
$f->correo<br />
$f->celular</p>";*/
  $target_dir = "imagenestra/empresa/$empresa/Usuario/$us/";

$directorio = opendir("imagenestra/empresa/$empresa/Usuario/$us/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        $archi=$archivo;
    }
}
$isTouch = isset($archi);
$resul="<div align='center'>"."<b><h2>".$f->nombre." ".$f->apellido_m." ".$f->apellido_p."</h2></b><p><u><b>     N&uacute;mero telef&oacute;nico</u></b>: ".$f->celular;
if ($isTouch==true) {

$resul2="<br><img id='img1' src='imagenestra/empresa/$empresa/Usuario/$us/$archi' alt='Avatar' class='img1'>";
}else{

$resul3="<br><img id='img1' src='imagenestra/INICIO.png' alt='Avatar' class='img1'>";
}


$resul4="<img alt='mail' height='23' src='http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png' title='mail' width='23' /><u><b> Correo Personal</u></b>: ".$f->correo;

echo $resul;echo $resul4;
if ($isTouch==true) {

echo $resul2;
}else{

echo $resul3."</p></div>";
}


?>