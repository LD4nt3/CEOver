<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
$res="";
session_start();
 $empresa=$_SESSION['empresa'];
$rem= $_SESSION['rem'];//2
$tra=$_SESSION['id_empleado'];//1
$nom=$_SESSION['nom'];
//$tra=1;
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
//aaassaaasdasdasdsadsasasdasdasdasda la session usuario nos dice la empresa entonce cvoncatemos en la  tabla donde se vaya a usar

 $quer= $mysqli->query( "SELECT COUNT(fk_usuario) as men
FROM conexion_men$empresa
WHERE fK_usuario='$rem' and remitente='$tra' ");
 $x = $quer->fetch_object();

if( $x->men!=$_SESSION['cant']){

 $sql =$mysqli->query( "SELECT mensaje, tiempo 
FROM conexion_men$empresa
WHERE fK_usuario='$rem' and remitente='$tra' ");
 $sql->data_seek($_SESSION['cant']);//ir al ultimo mensaje
	$_SESSION['cant']=$x->men;//resetar valor

 for($i=$_SESSION['cant'];$f = $sql->fetch_object();$i++){ 
  $res=$res."  <li style='border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;background-color:#ffffe6;'  class='cont' id='$x->men'>
      <p><b class='text-danger'>$nom</b> - $f->mensaje	
        </p><div align='right'>
          - <small><em>$f->tiempo</em></small>
        </div>
      <p></p>
    </li>";
     $x->men= $x->men+1;//para checar el numero de mensaje y saber a cual div ir o mensaje reciente
} 


}
echo $res;


?>