
<?php 
session_start();
 $empresa=$_SESSION['empresa'];
$id=$_SESSION['auxi'];
$pro=$_POST["pros"];
$cod=$_POST["cod"];
$nom=$_POST["nom"];
$rev=$_POST["rev"];
$norma=$_POST["norma"];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
 $sql2 =$mysqli->query( " SELECT procedimiento,Nombre,Codigo from procedimiento$empresa");
  	$error=0;

  for($j=0;$f2 = $sql2->fetch_object();$j++){
if($f2->Codigo==$pro&&$f2->Nombre==$nom)
  	$error=1;
	
}
  	if($error!=1){
  	    $rev++;
$mysqli->query("UPDATE procedimiento$empresa SET Codigo='$cod',Nombre='$nom',procedimiento='$pro',Revision='$rev',fk_norma='$norma'
             WHERE id_procedimiento='$id'");
             echo 'Exito';
  	}
  	else
  	echo "Error: Nombre o codigo ya existente";


 ?>
