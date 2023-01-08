<?php

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$caux=0;

$digo=$_POST['code'];

    $result = $mysqli->query("SELECT correo,n_empresa FROM codigos where codigo='$digo'");
    $cont = $result->num_rows;
if($cont>0){
  $contra=$_POST['p1'];

$passw=password_hash($contra, PASSWORD_BCRYPT);
$ss = $result->fetch_object();
$numb=$ss->n_empresa;
$mail=$ss->correo;
$mysqli->query( "UPDATE usuario$numb set pass = '$passw' WHERE correo='$mail' ");
$mysqli->query( "DELETE FROM codigos WHERE correo = '$mail' ");
$caux=1;


}
echo $caux;

?>