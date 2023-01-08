<?php
session_start();
$empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
$olo=$_POST["name"];
$item=$_POST["item"];
$desc=$_POST["desc"];
$obs=$_POST["obs"];

$fechai=$_POST["fechai"];
$horai=$_POST["horai"];
$fechaf=$_POST["fechaf"];
$horaf=$_POST["horaf"];
$pipo2=$_POST["pipo2"];




$mysqli->query("UPDATE tiempo$empresa SET Estado='$item',Observaciones='$obs',DescribeT='$desc',tiempo_i='$fechai',hora_i='$horai',tiempo_f='$fechaf',hora_f='$horaf' WHERE fk_trabajo='$olo' AND fk_usuario='$pipo2'");



?>