<?php
session_start();
$empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
$olo=$_POST["name"];
$item=$_POST["item"];
$desc=$_POST["desc"];
$obs=$_POST["obs"];
$trabajo=$_POST["nombre"];
	use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/Exception.php';
require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/PHPMailer.php';

require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/SMTP.php';
  $mysqli->query("UPDATE tiempo$empresa SET Estado='$item',Observaciones='$obs',DescribeT='$desc' WHERE fk_trabajo='$olo' AND fk_usuario='$us'");


$_SESSION["name"]=$olo;
if($item=="Con problemas"){
        $sqlin =$mysqli->query( "SELECT fk_dep from usuario$empresa where id_empleado='$us'");
      $x= $sqlin->fetch_object() ;
      
    $sql =$mysqli->query( "SELECT id_empleado, correo
  FROM usuario$empresa where id_empleado 
IN (select fk_usuario from rol$empresa where permiso ='Encargado') 
AND fk_dep='$x->fk_dep'
     ");
     
      $f= $sql->fetch_object() ;
   $correo=$f->correo;
$msg='';
	function sendMessage(){
	     global $trabajo, $olo,$f,$msg,$empresa;
	    $msg='El trabajo: '. $trabajo .' Numero: '.$olo.' tiene problemas';
	print($msg);
	print("\n");

		$content = array(
			"en" =>$msg
			);
		
		$fields = array(
			'app_id' => "327cf059-eb1c-4c13-8396-08802607f832",
			'filters' => array(array("field" => "tag", "key" => "userId", "relation" => "=", "value" =>$f->id_empleado),array("operator" => "AND"),array("field" => "tag", "key" => "userEm", "relation" => "=", "value" =>$empresa )),
			'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic ZDI4MmFiYWMtNjA5ZS00N2NkLTk1YTMtMzFiMTU0NDhmNmM1'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
	print("\n\nJSON received:\n");
	print($return);
	print("\n");


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
$mail->Subject  = 'Trabajos Ceover';
$mail->Body     = $msg;
if(!$mail->send()) {
  echo 'Mensaje no enviado';
  echo 'error: ' . $mail->ErrorInfo;
} else {
 // echo "<div align='center'>El mensaje fue enviado por correo, el mensaje tardara unos minutos en llegar, si no lo ah recebido, revise su bandeja de Spam.</div>";
}


}

?>