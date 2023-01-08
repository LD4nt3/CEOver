<?php 

session_start();
$mail=$_POST["correo"];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8');
$result = $mysqli->query("SELECT nombre FROM empresa");
$cont = $result->num_rows;
for($o=1;$o<=$cont;$o++){

$sql =$mysqli->query( "SELECT correo,pass,id_empleado FROM usuario$o WHERE correo='$mail'");
$ss=$sql->num_rows;
$f = $sql->fetch_object();
$resultado=0;

if($ss>0){
    
if(password_verify($_POST["contra"], $f->pass))
  {

      
    $resultado="ok";
$_SESSION['id_empleado']=$f->id_empleado;
$_SESSION['empresa']=$o;
  echo"<script type='text/javascript'>
  OneSignal.push(function() {
  OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
    if (isEnabled){

    OneSignal.sendTags({
    userId: '$f->id_empleado', 
    userEm: '$o'
  }).then(function(tagsSent) {
    // Callback called when tags have finished sending
    console.log(tagsSent);   
                        
  window.location = 'perfilAdmin.html';
  });
    }
    else{
      window.location = 'perfilAdmin.html';
    }
        
    });
})
</script>";
$o=$cont;
  }
}
}
  

echo $resultado;
  
?>
