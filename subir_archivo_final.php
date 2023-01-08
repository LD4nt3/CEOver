<?php
session_start();
$empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
$olo=$_POST["name"];
$item='Entregado';
$desc=$_POST["desc"];
$obs=$_POST["obs"];
$mes= date("m");
$dia=date("d")-1;
$a=date("Y");
$sql =$mysqli->query(  "SELECT (Select id_trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo,(Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo2,(Select archivo from trabajo$empresa where id_trabajo=fk_trabajo) as archivo,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as empleado,estado,tiempo_i,hora_i,hora_f,tiempo_f,observaciones from tiempo$empresa where  fk_trabajo='$olo' AND fk_usuario='$us'");
$f = $sql->fetch_object();

	$mesA=substr($f->tiempo_f,5,-3);
	$Anio=substr($f->tiempo_f,0,-6);
	$diaA=substr($f->tiempo_f,8);
	if($mesA==$mes && $Anio==$a && $dia<=$diaA){
	     $mysqli->query("UPDATE tiempo$empresa SET Estado='$item',Observaciones='$obs',DescribeT='$desc' WHERE fk_trabajo='$olo' AND fk_usuario='$us'");

$_SESSION["name"]=$olo; 
	}else{
	    
	    $item='Tarde';
	     $mysqli->query("UPDATE tiempo$empresa SET Estado='$item',Observaciones='$obs',DescribeT='$desc' WHERE fk_trabajo='$olo' AND fk_usuario='$us'");

$_SESSION["name"]=$olo;   
	}

?>