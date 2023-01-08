<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
session_start();
error_reporting(0);
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$us=$_SESSION['id_empleado'];
$empresa=$_SESSION['empresa'];
$sql =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$f = $sql->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$f2 = $sq->fetch_object();

echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Bienvenido a:</b></span></p>

<p style='text-align: center;'><span style='font-size:24px;'><b>T&uacute; Perfil!</b></span></p>";
/*echo "$f->nombre<br />
$f->correo<br />
$f->celular</p>";*/
  $target_dir = "imagenestra/empresa/$empresa/Usuario/$us/";

$directorio = opendir("imagenestra/empresa/$empresa/Usuario/$us/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        $archi=$archivo;
    }
}
$isTouch = isset($archi);
$resul="<div align='center'>"."<b><h2>".$f->nombre." ".$f->apellido_m." ".$f->apellido_p."</h2></b><p><u><b>     N&uacute;mero tel&eacute;fonico</u></b>: ".$f->celular;
if ($isTouch==true) {

$resul2="<br><img id='img1' class='imge' src='http://ceover.com/imagenestra/empresa/$empresa/Usuario/$us/$archi' alt='Avatar' class='img1'>";
}else{

$resul3="<br><img id='img1' class='imge' src='http://ceover.com/imagenestra/INICIO.png' alt='Avatar' class='img1'>";
}


$resul4="<img alt='mail' height='23' src='http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png' title='mail' width='23' /><u><b> Correo Personal</u></b>: ".$f->correo;

echo $resul;echo $resul4;
if ($isTouch==true) {

echo $resul2."</p></div><hr2></hr2>";
}else{

echo $resul3."</p></div><hr2></hr2>";
}


?>