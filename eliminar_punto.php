<?php
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
//aaassaaasdasdasdsadsasasdasdasdasda la session usuario nos dice la empresa entonce cvoncatemos en la  tabla donde se vaya a usar
$pk=$_POST["id"];
$empresa=$_SESSION['empresa'];
 $mysqli->query( "UPDATE punto$empresa SET Estado='Inactivo' WHERE id_puntos='$pk'");


?>