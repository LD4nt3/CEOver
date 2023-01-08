<?php
header('Content-Type: text/html; charset=UTF-8');  
session_start();
use PHPMailer\PHPMailer\PHPMailer; 
  use PHPMailer\PHPMailer\Exception;
  require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/Exception.php';

  /* The main PHPMailer class. */
  require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/PHPMailer.php';

  require '/home/nvoapn6eavh8/bin/PHPMailer-6.0.5/src/SMTP.php';
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
  $mysqli->set_charset("utf8");
  $rest = $mysqli->query("SELECT nombre FROM empresa");
  $conp = $rest->num_rows;


for($oo=1;$oo<=$conp;$oo++){
 $sql =$mysqli->query(  "SELECT  tiempo_f, fk_usuario, fk_trabajo, (SELECT trabajo from trabajo$oo where id_trabajo=fk_trabajo) as nombre,(SELECT id_trabajo from trabajo$oo where id_trabajo=fk_trabajo) as ID, ( SELECT fk_dep FROM usuario$oo where id_empleado=fk_usuario ) as dep FROM tiempo$oo where  DATEDIFF(tiempo_f, CURRENT_TIMESTAMP ) between -30 and -24  AND fk_trabajo IN (select fk_trabajo from cont$oo where calificacion <=2.5) GROUP BY fk_trabajo");
$msg="a";


for ($i=0; $s = $sql->fetch_object(); $i++) { 

  $sq =$mysqli->query( "SELECT id_empleado,correo
  FROM usuario$oo where id_empleado 
IN (select fk_usuario from rol$oo where permiso ='Encargado') 
AND fk_dep='$s->dep' ");


  $msg="\n Alerta el trabajo: ". $s->nombre ." Numero: ".$s->ID."\n No ha corregido los siguentes puntos:";

$sq2 =$mysqli->query( "SELECT fk_punto, (select descripcion from punto$oo  WHERE id_puntos=fk_punto) as des from cont$oo where calificacion <=2.5 and fk_trabajo='$s->ID' ");
for ($i=0; $ss = $sq2->fetch_object(); $i++) { 
    $msg=$msg."\n -".$ss->des;

}

      $f= $sq->fetch_object() ;
      $corr=$f->correo;
  function sendMessage(){
       global $f,$msg,$oo;
  print($msg);

  $content = array(
      "en" =>$msg
      );

    $fields = array(
      'app_id' => "327cf059-eb1c-4c13-8396-08802607f832",
      'filters' => array(array("field" => "tag", "key" => "userId", "relation" => "=", "value" =>$f->id_empleado),array("operator" => "AND"),array("field" => "userEm", "relation" => "=", "value" => $oo)),
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
  $msg="";
}


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
$mail->addAddress($corr);
$mail->Subject  = 'Problemas de calidad!';

$mail->Body=$msg;

if(!$mail->send()) {
    echo $corr."aaa";

  echo 'Mensaje no enviado';
  echo 'error: ' . $mail->ErrorInfo;
} else {
  echo 'El mensaje fue enviado por correo';
}


}

 


?>