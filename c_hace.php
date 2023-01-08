<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
//impresion completa de un chat
$res="";
session_start();
 $empresa=$_SESSION['empresa'];
$rem=$_SESSION['rem'];
$tra=$_SESSION['id_empleado'];//1
//$tra=1;//1

$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
//aaassaaasdasdasdsadsasasdasdasdasda la session usuario nos dice la empresa entonce cvoncatemos en la  tabla donde se vaya a usar

 $quer= $mysqli->query( "SELECT COUNT(fk_usuario) as men
 FROM conexion_men$empresa
 WHERE fK_usuario='$rem' and remitente='$tra' ");
 $f = $quer->fetch_object();
 $_SESSION['cant']=$f->men;
 $nom=$_SESSION['nom'];

 $sql =$mysqli->query( "SELECT mensaje, fK_usuario, tiempo 
 FROM conexion_men$empresa
 WHERE fK_usuario='$rem' and remitente='$tra' or  remitente='$rem' and fK_usuario='$tra' order by tiempo asc");

 for($i=0;$f = $sql->fetch_object();$i++){ 
if ($f->fK_usuario==$tra) {
	# code...

  $res=$res." <li style='border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;background-color:#ffe6e6;' class='cont'  id='$i'>
      <p>&nbsp;<b class='text-success'>Tu</b>  - $f->mensaje	
        </p><div align='right'>
          - <small><em>$f->tiempo</em></small>
        </div>
      <p></p>
    </li>";
	} 

	else
	{
		  $res=$res."  <li style='border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;background-color:#ffffe6;' class='cont' id='$i'>
      <p><b class='text-danger'>$nom</b> - $f->mensaje	
        </p><div align='right'>
          - <small><em>$f->tiempo</em></small>
        </div>
      <p></p>
    </li>";
	}
}
echo $res;


?>