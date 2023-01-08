<?php
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$result = $mysqli->query("SELECT nombre FROM empresa");
    $cont = $result->num_rows;
    $piv=0;
$total=0;
$val=1;



for($empresa=1;$empresa<=$cont;$empresa++){
  $sql =$mysqli->query( "SELECT * FROM usuario$empresa ");//


for($i=0;$f = $sql->fetch_object();$i++){

  $sq =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario='$f->id_empleado'");//selecciona todos los trabajos del usuario en especifico
  
for ($o=0; $cuenta = $sq->fetch_object(); $o++) { 

$squ =$mysqli->query( "SELECT  AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$cuenta->fk_trabajo'");
   $pro = $squ->fetch_object();
   if ($cuenta->Estado=='Entregado') {

   $total=$total+$pro->calificacion;
   $piv++;


}
}
if($piv!=0){
$total=$total/$piv;
    echo"<br>".$total;
}else{$total=0;}



if ($total!=0 && $total>3.6 ) {
    $result2 = $mysqli->query("SELECT * FROM puntuacion$empresa");
    $cont2 = $result2->num_rows;
    if($val<4){
    if($cont2<3){
  $sqlu = "INSERT INTO puntuacion$empresa(fk_usuario,calificacion) VALUES  ('".$f->id_empleado."','".$total."')";
        mysqli_query($mysqli,$sqlu); echo"diferente".$total; }else{ $sql5 =$mysqli->query( "UPDATE puntuacion$empresa SET fk_usuario='$f->id_empleado' , calificacion='$total' WHERE id_lugares = '$val'"); echo"hola".$total;}
    }
      $val++;  
}
$total=0;
$piv=0;
}
 $val=1;

}

?>