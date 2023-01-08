<?php
session_start();
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$pk=$_POST["reco"];
 $mysqli->query( "UPDATE puntuacion$empresa SET recompensa='$pk' WHERE id_lugares=1");
header('location: tabla_puntuaciones_usuario.html');
?>