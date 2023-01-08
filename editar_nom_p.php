<?php 
session_start();
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$ids=json_decode($_POST['ids']);
$desc=$_POST["pros"];
$norm=$_POST["nom"];
$idno=$_POST["idnom"];
$lim = count((array)$ids); 
$error=0;
for ($i=0; $i <$lim ; $i++) { 

	$nombre=$ids[$i]->nombre;
/*
$sql1 =$mysqli->query( " SELECT fk_norma,(select normativa from normativa where id_normativa=fk_normativa)as normativa from con_norma where fk_norma='$idno'");

  for($k=0;$f3 = $sql1->fetch_object();$k++){
if($f3->normativa==$nombre)
  	$error=1;
	}*/
$sql1 =$mysqli->query( " SELECT fk_norma,(select norma from norma$empresa where id_norma=fk_norma)as norma, COUNT(*) Total FROM con_norma$empresa GROUP BY fk_norma");

  for($j=0;$f2 = $sql1->fetch_object();$j++){
if($f2->norma==$norm)
  	$error=1;
	}

}
for ($i=0; $i <$lim ; $i++) { 
	$nombre=$ids[$i]->nombre;
	$pk=$ids[$i]->pk;
	$mysqli->query("UPDATE normativa$empresa SET normativa='$nombre'
             WHERE id_normativa='$pk'");
}
if( $error!=1){

	$mysqli->query("UPDATE norma$empresa SET norma='$norm',
            descripcion='$desc'
             WHERE id_norma='$idno'");
echo"Exito";

} 
else
echo"Error: Norma o normativa repetida";


?>