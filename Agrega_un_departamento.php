



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
    if(response!='Administrador' || response==0){window.location = "http://ceover.com/home.html";}
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
 $empresa=$_SESSION['empresa'];
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
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>
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
<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Abre un departamento</b></span><b style="font-size: 24px;">!&nbsp; &nbsp; &nbsp; &nbsp;</b></p>
<hr2></hr2>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
<form method="post">
<p style="text-align: center;">Nombre del Departamento:&nbsp;<input name="nombre" id="nombre" type="text" /></p>

<p>&nbsp;</p>
<?php
$wigga =$mysqli->query( "SELECT correo FROM usuario$empresa where id_empleado ='$us'");

$foco = $wigga->fetch_object();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/Exception.php';
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/PHPMailer.php';

require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/SMTP.php';


$dbcon = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
function generallave(){
  $longitud=5;
  $str="ABCDEFGHIJKLMNOPQRSTXYZ123456789";
  $random= substr(str_shuffle($str),0,$longitud);
  return $random;
}

if(isset($_POST["submit"]))
{

$string=generallave();
//$string
$nombresito=$_POST["nombre"];
echo "<div align='center'>Se envio el codigo del departamento: ".$nombresito."a su correo</div><br>";

  $sql = "INSERT INTO departamento$empresa(nombre,codigo) VALUES  ('".$_POST["nombre"]."','".$string."')";
        mysqli_query($dbcon,$sql);




$mail = new PHPMailer(true);
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = 'tls';
$mail->Host = "relay.secureserver.net"; // SMTP server

$mail->Port = 587; // set the SMTP port for the GMAIL server
$mail->IsHTML(); // set the SMTP port for the GMAIL server

// optional
// used only when SMTP requires authentication

//$mail->SMTPAuth = true;

// optional
// used only when SMTP requires authentication

$mail->Username = 'admin@ceover.com';
$mail->Password = 'Pipomuere666';


$mail->setFrom('admin@ceover.com' );
$mail->addAddress($foco->correo);
$mail->Subject  = 'Codigo de tu nuevo departamento '.$nombresito;
$mail->Body     = '¡Gracias por usar nuestra pagina web!, el codigo de tu nuevo departamento es: '.$string.'   este codigo sirve para que tus empleados puedan ser asignados a el departamento.';
if(!$mail->send()) {
  echo 'Mensaje no enviado';
  echo 'error: ' . $mail->ErrorInfo;
} else {
  echo "<div align='center'>El mensaje fue enviado por correo, el mensaje tardara unos minutos en llegar, si no lo ah recebido, revise su bandeja de Spam.</div>";
}


}


?>

  
<p>&nbsp;</p>

<p style="text-align: center;"><input name="submit" type="submit" value="Crear departamento" /></p>

<p>&nbsp;</p>

</form>

<p><hr2></hr2></p>


<p>&nbsp;</p>
</body>
</html>
