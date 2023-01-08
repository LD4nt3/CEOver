<?php
session_start();
 $empresa=$_SESSION['empresa'];
$act=0;
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$emp=$_SESSION['id_empleado'];
$ids=json_decode($_POST['enla']);
$trab=$_POST['fkt'];
$sq =$mysqli->query( "SELECT nombre,apellido_p,apellido_m from usuario$empresa  where id_empleado='$emp'");
$f = $sq->fetch_object();
$cal=$f->nombre." ".$f->apellido_p." ".$f->apellido_m;
$lim = count((array)$ids); 
 $so =$mysqli->query( "SELECT version from tiempo$empresa  WHERE fk_trabajo='$trab'");
    $fo = $so->fetch_object();
    if($fo->version=='A'){
for ($i=0; $i <$lim ; $i++) { 
    $sql = "INSERT INTO cont$empresa(fk_trabajo,fk_punto,calificacion) VALUES  ('".$trab."','".$ids[$i]->pk."','".$ids[$i]->cal."')";
        mysqli_query($mysqli,$sql);
        if($ids[$i]->cal<3)
        {
            $act=1;
        }

  } 
}
else
{
    for ($i=0; $i <$lim ; $i++) { 
      $kal =$ids[$i]->cal;
      $pto=$ids[$i]->pk;
    $mysqli->query( "UPDATE cont$empresa set calificacion = '$kal' WHERE fk_trabajo='$trab' and fk_punto = '$pto'");

    if( $kal<3)
        {
            $act=1;
        }

} 
    
}


$mysqli->query( "UPDATE tiempo$empresa set calificado = '$cal',Estado = 'Calificado' WHERE fk_trabajo='$trab' ");

if($act==1)
{

    $ver=$fo->version;
    $ver++;
    $h = "-6";// otorga la hora actual, dependiendo de donde te encuentres sera + o - 
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
    $mysqli->query( "UPDATE tiempo$empresa set Estado = 'En Proceso',  tiempo_f = '$fech',  version = '$ver' WHERE fk_trabajo='$trab' ");
    
}

?>