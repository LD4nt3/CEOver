<?php
session_start();
 $empresa=$_SESSION['empresa'];
 $us=$_SESSION['id_empleado'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$pk=$_POST["id"];
    $h = "-6";// otorga la hora actual, dependiendo de donde te encuentres sera + o - 
	$hm = $h * 60; 
	$ms = $hm * 60;
	$gmdate = gmdate("d/m/Y g:i:s A", strtotime('+30 day')+($ms)); // el mas puede ser cambiado para que se adecue con tu zona horaria.
	$dia=substr($gmdate,0,-19);
	$hora=substr($gmdate,11);
	$fech = str_replace( "/", "",$dia); 

	$sq4 =$mysqli->query(  "SELECT * from usuario$empresa where id_empleado='$pk' ");
        $f =$sq4->fetch_object();
        $sql = "INSERT INTO eliminado_b$empresa (nombre,apellido_m,apellido_p,domicilio,celular,correo,pass,fk_dep,dia,hora) VALUES  ('".$f->nombre."','".$f->apellido_m."','".$f->apellido_p."','".$f->domicilio."','".$f->celular."','".$f->correo."','".$f->pass."','".$f->fk_dep."','".$fech."','".$hora."')";
        mysqli_query($mysqli,$sql);

             $sql = "INSERT INTO agregado$o(nombre,apellido_m,apellido_p,domicilio,celular,correo,pass,dia,hora) VALUES  ('".$_POST["nombre"]."','".$_POST["apellido_m"]."','".$_POST["apellido_p"]."','".$_POST["domicilio"]."','".$_POST["celular"]."','".$_POST["correo"]."','".$passw."','".$fech."','".$hora."')";

        mysqli_query($dbcon,$sql);

 $mysqli->query( "DELETE FROM usuario$empresa WHERE id_empleado='$pk'");


?>