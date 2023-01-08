<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
$res="";
session_start();
 $empresa=$_SESSION['empresa'];
$tra=$_SESSION['id_empleado'];//1
//$tra=1;
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 


 $sql =$mysqli->query( "SELECT nombre, id_empleado, apellido_p	 
FROM usuario$empresa where id_empleado<>'$tra' ");
 
 for($i=0;$f = $sql->fetch_object();$i++){ 

  $res=$res."  
    <div id='$f->id_empleado' name='$f->nombre $f->apellido_p' onclick='nSesion(this)' class='desa' >$f->nombre $f->apellido_p <hr></hr></div>
   ";
} 



echo $res;


?>