<?php
session_start();
 $empresa=$_SESSION['empresa'];
$val=$_POST['item1']; 
//preguntar paradoja, ya que no puedo eliminar el procedimiento si este esta ligado a un punto que esta siendo usado para calificar algun trabajo, solamente puedo borrar procedimientos que no esten ligados a puntos
echo $val;
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");



  $sql2 =$mysqli->query( "SELECT * from con_norma$empresa where fk_norma='$val' ");
  for ($i=0;$f = $sql2->fetch_object(); $i++) { 
  $sql3 =$mysqli->query( "UPDATE con_norma$empresa SET Estado='Inactivo' WHERE  fk_normativa = '$f->fk_normativa' and fk_norma='$val'");   
  $sql4 =$mysqli->query( "UPDATE normativa$empresa SET Estado='Inactivo' WHERE  id_normativa = '$f->fk_normativa' and fk_norma='$val'");   
  }

  //
  $sql5 =$mysqli->query( "UPDATE norma$empresa SET Estado='Inactivo' WHERE id_norma = '$val'");

?>