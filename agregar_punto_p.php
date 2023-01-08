<?php
session_start();

$empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$nombre=$_POST['pno'];
$proc=$_POST['pro'];
   $result = $mysqli->query("SELECT descripcion FROM descripcion$empresa where punto='$nombre' and Estado =='Activo' ");
    $cont = $result->num_rows;
if($cont<1){
    $sql = "INSERT INTO punto$empresa(descripcion,fk_pro) VALUES  ('".$nombre."','".$proc."')";
        mysqli_query($mysqli,$sql);
        echo"Exito";
}
else
echo"Error: Nombre de punto repetido"



?>