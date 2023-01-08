<?php
session_start();

$empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
   $sql =$mysqli->query(  "SELECT id_procedimiento,nombre FROM procedimiento$empresa ");
$res="";
for ($i=0; $f = $sql->fetch_object() ; $i++) { 

$res=$res." <option id='$f->id_procedimiento'>$f->nombre</option>";
}
echo $res;

?>