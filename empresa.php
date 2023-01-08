


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
        
</head>
<body background="https://www.beautycolorcode.com/8ed8e8.png" style="cursor: auto;">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p></a>
</div>
<div class="pad">

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Registra t&uacute; empresa!</b><b style="font-size: 24px;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></span></p>
<hr2></hr2>
<div class='grid-container' >

<div class="panel-body"><span><!--?php echo $message; ?--></span>

 <form method="post" enctype="multipart/form-data">
  <span ><label>Nombre de t&uacute; empresa</label></span><input class="form-control" id="nombre" name="nombre" type="text" required/>
   <span ><label>Correo electr&oacute;nico (se &uacute;sara para enviarle el c&oacute;digo de su empresa) </label></span><input class="form-control" id="correo" name="correo" type="email"      pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)"
    required title=" Ejemplo: test@mail.com">
  <span ><label>Seleccione el tipo de empresa</label><br></span><select id='tipo' name='tipo' >
  <option value="otro">Otro</option>
  <option value="Gastronomica">Gastron&oacute;mica</option>
  <option value="Hotelera">Hotelera</option>

</select>


<h3><span style="font-size:14px;"><span style="text-align: center;"><input name="term" type="checkbox" value="acepto los terminos y condiciones" required/>Acept&oacute; los t&eacute;rminos y condiciones</span></span></h3>


<div class="form-group"><input class="btn btn-info" id="submit" name="submit" type="submit" value="Registrar" /></div>
<?php

//error_reporting(E_ALL & ~E_NOTICE);
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8"); $message = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/Exception.php';
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/PHPMailer.php';

require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/SMTP.php';

if(isset($_POST["submit"]))
{


$dbcon = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
function generallave($x){
  $longitud=$x;
  $str="ABCDEFGHIJKLMNOPQRSTXYZ123456789";
  $random= substr(str_shuffle($str),0,$longitud);
  return $random;
}
$caux=0;
$nombresito=$_POST["nombre"];
$correo=$_POST["correo"];
$resultk =$dbcon->query(  "SELECT pk_empresa from empresa");
        $haz=$resultk->num_rows;
        $resultkk =$dbcon->query(  "SELECT pk_empresa from empresa where nombre='$nombresito' ");
        $ahaz=$resultkk->num_rows; 
  for($k=1;$k<=$haz;$k++){

$sq4 =$dbcon->query(  "SELECT id_empleado from usuario$k where correo='$correo' ");
 $aux=$sq4->num_rows;
 if($aux>0  )
 $caux=1;
}
if( $caux!=1){
        if($ahaz<1&&$haz<7){
$string=generallave(5);
//$string
echo "<div align='center'>Se envio el codigo de su Empresa: ".$nombresito."a su correo</div><br>";

  $sql = "INSERT INTO empresa(nombre,tipo,codigo) VALUES  ('".$_POST["nombre"]."','".$_POST["tipo"]."','".$string."')";
        mysqli_query($dbcon,$sql);
session_start();
$_SESSION['tipo']=$_POST["tipo"];
$result = $mysqli->query("SELECT nombre FROM empresa");
    $cont = $result->num_rows;
$_SESSION['acor']=$correo;

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
$string2=generallave(8);
$_SESSION['pas']=$string2;

$mail->setFrom('admin@ceover.com' );
$mail->addAddress($correo);
$mail->Subject  = 'Codigo de su nueva Empresa:  '.$nombresito;
$mail->Body     = '¡Gracias por usar nuestra pagina web!, el c&oacute;digo de tu Empresa es: '.$string.'   este c&oacute;digo sirve para Registrar a tus empleados, otorgale este c&oacute;digo a tus empleados, para que puedan crear una cuenta.
<br>Ingrese a su empresa colocando: <b>'.$correo.'</b> y Password:'.$string2.' <b></b>, <h2><b><u>Despu&eacute;s de iniciar sesi&oacute;n Cambie su Password por su seguridad.</b></u></h2>  ';
if(!$mail->send()) {
  echo 'Mensaje no enviado';
  echo 'error: ' . $mail->ErrorInfo;
} else {
  echo "<script>alert('El mensaje fue enviado a su correo, el mensaje tardara unos minutos en llegar, si no lo ha recebido, revise su bandeja de Spam.'); window.location = 'conn.php';</script>";
}

}else
{  echo "<script>alert('Error: Empresa ya existente o limite administrativo de numero de empresas');</script>";
    
}


}
else
echo "<div class='alert alert-danger'>Correo ya existente</div>";
}

?>
</form>
</div>
</div>
</div>

<p>&nbsp;</p>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</body>
</html>