<?php
session_start();
$val=1;
$empresa=$_SESSION['empresa'];
$x=$_SESSION['cons']+1; 
for ($i =0; $i< $x; ++$i) { 
   if(isset( $_POST["$i"])){
 $val=$i;
 $_SESSION['auxi']=$val;
  }
}

$val=$_SESSION['auxi'];

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "DELETE  FROM consejo$empresa  WHERE id_consejo = '$val'");


header('location: consejos.php')
?>