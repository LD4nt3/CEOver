<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
  $h = "-6";// otorga la hora actual, dependiendo de donde te encuentres sera + o - 
$hm = $h * 60; 
$ms = $hm * 60;
$gmdate = gmdate("d/m/Y g:i:s A", time()+($ms));

session_start();
 $empresa=$_SESSION['empresa'];
$rem= $_SESSION['rem'];//2
$tra=$_SESSION['id_empleado'];//1
//$tra=1;
$res=$_POST['saje'];
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
 
   $sql = "INSERT INTO conexion_men$empresa(fk_usuario, Remitente, tiempo, mensaje) VALUES  ('".$tra."','".$rem."','".$gmdate."','".$res."')";
          mysqli_query($mysqli,$sql);
 	
    



?>