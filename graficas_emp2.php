<?php
session_start();
$k=$_SESSION['usu'];
 $empresa=$_SESSION['empresa'];
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario=$k");


$sql4 =$mysqli->query( "SELECT nombre from usuario$empresa where id_empleado=$k");//para asignarle el nombre del departamento
	$f4 = $sql4->fetch_object();//^
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
echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estas son las gr&aacute;ficas del empleado: $f4->nombre</b></span><b style='font-size: 18px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='graficas.html'>volver</a></b>
<hr2></hr2>";
  $hol="";
    $holl="";
     $holj="";
for($i=0;$f = $sql->fetch_object();$i++){
	$holj="";

     $sql3 =$mysqli->query( "SELECT AVG(calificacion) as calificacion,fk_punto FROM cont$empresa where fk_trabajo='$f->fk_trabajo'");

   $f2 = $sql3->fetch_object();
   if ($f->Estado=='Entregado' || $f->Estado=='') {
 $sql7 =$mysqli->query( "SELECT fk_punto,calificacion FROM cont$empresa where fk_trabajo='$f->fk_trabajo'");


  
   	   $hol=$hol." 
<br>
<div class='grid-container'>

<div class='grid-item'>
<div id='piechart$i' style='width: 300px; height: 300px;'></div></div>

<div class='grid-item'>
<b><u>Nombre del trabajo</b></u>:$f->trab <br>
<b><u>Fecha de inicio del trabajo </b></u>: $f->tiempo_i  <br>
<b><u>Fecha de entrega del trabajo </b></u>: $f->tiempo_f <br>
<b><u>Estado del trabajo</b></u>: $f->Estado<br>
<b><u>Observaciones</b></u>: $f->Observaciones <br>
<b><u>Calificacion Final del trabajo</b></u>:$f2->calificacion<br><br><br><br>";

for ($l=0; $f7 = $sql7->fetch_object(); $l++) { 
	if ($f7->calificacion<2.5) {
	 $sql6 =$mysqli->query( "SELECT consejo FROM consejo$empresa where fk_punto='$f7->fk_punto'");
	 $f6 = $sql6->fetch_object();

	$holj=$holj."<br><b><u>Consejo</b></u>: $f6->consejo";
}

}
$hol=$hol.$holj;

	   $hol=$hol." 
</div></div> <hr2></hr2>
";

   
}


}
echo $hol;

?>