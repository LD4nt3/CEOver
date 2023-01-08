<?php
session_start();
 $empresa=$_SESSION['empresa'];
if(isset($_POST["Crear"])){
$host = 'localhost'; //Host del Servidor MySQL
  $database = 'Ceover'; //Nombre de la Base de datos
  $user = 'id4nt3'; //Usuario de MySQL
  $pass = 'pipomuere666'; //Password de Usuario MySQL
 $dir ='dump.sql';
 $fecha = date("Ymd");
//  $fecha = date("Ymd"); //Obtenemos la fecha y hora para identificar el respaldo
 
  // Construimos el nombre de archivo SQL Ejemplo: mibase_20170101.sql
//  $salida_sql = $db_name.'_'.$fecha.'.sql'; 
  
  //Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
  //$dump = "C:/usr/bin/mysqldump  --user=".$db_user."--password=".$db_pass."--host=".$db_host." ".$db_name."> $salida_sql";

exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} agregado$empresa conexion_men$empresa consejo$empresa cont$empresa con_norma$empresa departamento$empresa eliminado_b$empresa informe$empresa norma$empresa normativa$empresa permisos_co$empresa procedimiento$empresa punto$empresa puntuacion$empresa rol$empresa tiempo$empresa trabajo$empresa usuario$empresa vistas$empresa --result-file={$dir} 2>&1", $salida_sql);
var_dump($salida_sql);
header('Location: dump.sql');

 //Ejecutamos el comando para respaldo
    $zip = new ZipArchive(); //Objeto de Libreria ZipArchive
  
  //Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
  $salida_zip = $_POST["nombre_archivo"].'_'.$fecha.'.zip';
  
  if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
    $zip->addFile("dump.sql"); //Agregamos el archivo SQL a ZIP
    $zip->close(); //Cerramos el ZIP
    unlink("dump.sql"); //Eliminamos el archivo temporal SQL
    
    header ("Location: $salida_zip"); // Redireccionamos para descargar el Arcivo ZIP

    } else {
    echo 'Error'; //Enviamos el mensaje de error
  }
 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<style type="text/css">footer {
  background-color: rgb(238, 238, 238);
  position:fixed;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: black;
}
hr2 { 
    display: block;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 5em;
    margin-right: 5em;
    border-style: inset;
    border-width: 2px;
}
      .center {
    text-align: center;
}
      #cajon1{
float:left;

}
#cajon2{
float:both;


}
	</style>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" />  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script>
  $(function() {

      $.ajax({
   url: 'red.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response==0){window.location = "http://ceover.com/home.html";}
    console.log(response);
   }
}); 

      
  });
  </script>
         <script>
  $(function() {

      $.ajax({
   url: 'sinpermiso.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response=='Empleado' || response==0){window.location = "http://ceover.com/home.html";}
    console.log(response);
   }
}); 

      
  });
  </script>
        <script>
  $(function() {

      $.ajax({
   url: 'sinpermiso.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response=='Co-Administrador'){window.location = "http://ceover.com/home.html";}
    console.log(response);
   }
}); 

      
  });
  </script>
  </head>
<body background="https://www.beautycolorcode.com/8ed8e8.png" style="cursor: auto;">
<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p>
</div>

<?php  
session_start();
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fa = $sq->fetch_object();
if($fa->permiso=='Administrador'){
    echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Puntuaciones&nbsp;   </a></li>
  <li ><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
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
 

 <li class='active'><a href='Respaldo.php' >  &nbsp; Respaldo de la empresa&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";
}else if($fa->permiso=='Encargado'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";
}
?>


<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Crea un respaldo para tus datos</b></span><b style="font-size: 24px;">!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><span style=" font-family: tahoma, geneva, sans-serif; text-align: center;"><a href="descarga4.php" style=" font-family: tahoma, geneva, sans-serif; text-align: center;">Descagar respaldo&nbsp;semanal</a></span></p>
<hr2></hr2>

<p>&nbsp;</p>
<form method="POST">
<p style="text-align: center;">Nombre del archivo:&nbsp;<input name="nombre_archivo" id="nombre_archivo" type="text" /></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p style="text-align: center;"><input name="Crear" type="submit" value="Crear" /></p>
</form>
<p>&nbsp;</p>

<p><hr2></hr2></p>

<p>&nbsp;</p>
</body>
</html>
