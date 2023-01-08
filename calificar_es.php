<?php
session_start();

$empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
   $sql =$mysqli->query(  "SELECT id_puntos,descripcion FROM punto$empresa ");
$res="";
for ($i=0; $f = $sql->fetch_object() ; $i++) { 
if($f->id_puntos>5){

$res=$res." <option id='$f->id_puntos' name='$f->descripcion'>$f->descripcion</option>";
  }
}
echo $res;

?>