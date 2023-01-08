
<?php
session_start();

$empresa=$_SESSION['empresa'];
error_reporting(E_ALL & ~E_NOTICE);
$pas=$_POST["pass"];
$passw=password_hash($pas, PASSWORD_BCRYPT);
$dbcon = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
     $message = "";

if(isset($_POST["submit"]))
{
  if ($_POST["confirma"]==$_POST["correo"]) {
    # code...
  $us=$_POST['cod'];
$sql2 = $dbcon->query("SELECT pk_d_id,codigo from departamento$empresa where codigo='$us'");
$f = $sql2->fetch_object();
if ($f->codigo==$us) {
    
      $resultk =$dbcon->query(  "SELECT id_agregado from agregado$empresa");
        $haz=$resultk->num_rows;
        
             $h = "-6";// otorga la hora actual, dependiendo de donde te encuentres sera + o - 
	$hm = $h * 60; 
	$ms = $hm * 60;
	$gmdate = gmdate("d/m/Y g:i:s A", strtotime('+30 day')+($ms)); // el mas puede ser cambiado para que se adecue con tu zona horaria.
	$dia=substr($gmdate,0,-19);
	$hora=substr($gmdate,11);
	$fech = str_replace( "/", "",$dia); 
        if($haz>100)
        {    
               $row = $resultk->fetch_object();
               $dela=$row->id_agregado;
              $mysqli->query( "DELETE FROM agregado$empresa where id_agregado='$dela' ");
        }       
         $sql = "INSERT INTO agregado$empresa(nombre,apellido_m,apellido_p,domicilio,celular,correo,pass,dia,hora) VALUES  ('".$_POST["nombre"]."','".$_POST["apellido_m"]."','".$_POST["apellido_p"]."','".$_POST["domicilio"]."','".$_POST["celular"]."','".$_POST["correo"]."','".$passw."','".$fech."','".$hora."')";

        mysqli_query($dbcon,$sql);

	  $sql = "INSERT INTO usuario$empresa (nombre,apellido_m,apellido_p,domicilio,celular,correo,pass,fk_dep) VALUES  ('".$_POST["nombre"]."','".$_POST["apellido_m"]."','".$_POST["apellido_p"]."','".$_POST["domicilio"]."','".$_POST["celular"]."','".$_POST["correo"]."','".$passw."','".$f->pk_d_id."')";
        mysqli_query($dbcon,$sql);
$nom=$_POST["nombre"];
$cor=$_POST["correo"];

$sql3 =$dbcon->query(  "SELECT id_empleado,nombre,correo from usuario$empresa where nombre='$nom' AND correo='$cor' ");
$f2 = $sql3->fetch_object();

  $carpeta = 'imagenestra/empresa/'.$empresa.'/Usuario/'.$f2->id_empleado;
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
echo "<SCRIPT> 
alert('Empleado agregado');
</SCRIPT>";
header('location: Departamentos.php');
}else{

 $message = "<div class='alert alert-danger'>clave de departamento erronea</div>";
}


  }else
       $message = '<div class="alert alert-danger">los correos no son iguales</div>';

}


?>
<!DOCTYPE html>
<html>
<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
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
.grid-container {
  display: grid;
  grid-template-columns: auto ;
margin-left: 90px;
margin-right: 90px;
  padding: 0.1px;
}
.grid-item {

  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 20px;
  text-align: center;
}
	</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  $(function() {
                localStorage.setItem('pipa',0);
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
   url: 'YMCAEMPLEADO.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response==0){window.location = "http://ceover.com/home.html";}
    console.log(response);
   }
}); 

      
  });
  </script> 
</head>
<body background="https://www.beautycolorcode.com/8ed8e8.png" style="cursor: auto;">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p></a>
</div>
<?php  

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$mod=0;
$eli=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==4 && $fol->activado==1){$comeback=1;}
    if($fol->pk_perm==5 && $fol->activado==1){$mod=1;}
    if($fol->pk_perm==9 && $fol->activado==1){$eli=1;}
}
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
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
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
}else if($fa->permiso=='Encargado' || $fa->permiso=='Co-Administrador'){
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
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>
";
if($fa->permiso=='Co-encargado'){echo"<li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}else{
echo"<li><a href='trabajos_generales.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}echo"
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
<div class="pad">

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Agrega un nuevo empleado!</b><b style="font-size: 24px;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></span></p>
<hr2></hr2>
<div class='grid-container' >

<div class="panel-body"><span><!--?php echo $message; ?--></span>

 <form method="post" enctype="multipart/form-data">
  <span ><label>Nombre</label></span><input class="form-control" id="nombre" name="nombre" type="text" required/>
  <span ><label>Apellido paterno</label></span><input class="form-control" id="apellido_p" name="apellido_p" type="text" required/>
  <span><label>Apellido materno</label></span><input class="form-control" id="apellido_m" name="apellido_m" type="text" required/>
  <span ><label>Domicilio</label></span><input class="form-control" id="domicilio" name="domicilio" type="text" required/>
<span ><b>Telefono</b></span><br />
<input class="form-control" id="celular" name="celular" type="text" required/>

<span <label><b>Correo Electronico</b></label></span> <input class="form-control" id="correo" name="correo" type="text" required/>

<span ><b>Confirmacion de Correo Electronico</b></span><br />
<input class="form-control" id="confirma" name="confirma" type="text"required />
<?php 
echo "$message";
?>
<span ><label>Contrase&ntilde;a</label></span> <input class="form-control" id="pass" name="pass" type="password"required />

<span ><b>Ingresa el codigo de departamento: </b></span><br />
<input class="form-control" id="cod" name="cod" type="text"required />

<h3><span style="font-size:14px;"><span style="text-align: center;"><input name="term" type="checkbox" value="acepto los terminos y condiciones" required/>Acepto los terminos y condiciones</span></span></h3>


<div class="form-group"><input class="btn btn-info" id="submit" name="submit" type="submit" value="Ingresar" /></div>

</form>
</div>
</div>
</div>

<p>&nbsp;</p>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</body>
</html>