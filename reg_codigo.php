<?php
	use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/Exception.php';
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/PHPMailer.php';

require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/SMTP.php';

function generallave(){
  $longitud=8;
  $str="ABCDEFGHIJKLMNOPQRSTXYZ123456789";
  $random= substr(str_shuffle($str),0,$longitud);
  return $random;
}

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$caux=0;
$correo=$_POST['mail'];
    $result = $mysqli->query("SELECT nombre FROM empresa");
    $cont = $result->num_rows+1;
  for($k=1;$k<$cont;$k++){

$sq4 =$mysqli->query(  "SELECT id_empleado from usuario$k where correo='$correo' ");
 $aux=$sq4->num_rows;
 if($aux>0  )
 $caux=$k;
}

if($caux>0){

	$code=generallave();

	   $resq = $mysqli->query("SELECT correo FROM codigos where correo='$correo'");
    $este = $resq->num_rows;
if($este>0)
{
    $zz = $resq->fetch_object();
    $mal=$zz->correo;
    $mysqli->query( "DELETE FROM codigos where correo='$mal' ");

}   $h = "-6";// otorga la hora actual, dependiendo de donde te encuentres sera + o - 
	$hm = $h * 60; 
	$ms = $hm * 60;
	$gmdate = gmdate("d/m/Y g:i:s A", strtotime('+30 day')+($ms)); // el mas puede ser cambiado para que se adecue con tu zona horaria.
	$mes=substr($gmdate,3,-16);
	$dia=substr($gmdate,0,-19);
	$anio=substr($gmdate,6,-11);
	$hora=substr($gmdate,11);//,-3
	$afech=$anio.'-'.$mes.'-'.$dia;
	$clear= array("/", " ");
	$fech = str_replace( $clear, "",$afech);
    $sql = "INSERT INTO codigos(n_empresa,codigo,correo,fecha) VALUES  ('".$caux."','".$code."','".$correo."','".$fech."')";
        mysqli_query($mysqli,$sql);

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
$mail->addAddress($correo);
$mail->Subject  = 'Recuperacion de password Ceover';
$mail->Body     = 'Ingrese este c&oacute;digo: '.$code.' en ceover.com/recuperar.html para cambiar su password';
if(!$mail->send()) {
  echo 'Mensaje no enviado';
  echo 'error: ' . $mail->ErrorInfo;
} else {
  echo "El mensaje fue enviado por correo, el mensaje tardara unos minutos en llegar, si no lo ha recebido, revise su bandeja de Spam.";
}


}

//echo "Correo enviado: El mensaje tardara unos minutos en llegar, si no lo ah recebido, revise su bandeja de Spam";

?>