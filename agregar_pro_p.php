
<?php 
session_start();
$_SESSION['id_empleado'];
 $empresa=$_SESSION['empresa'];
$o="A";
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$sql2 =$mysqli->query( " SELECT procedimiento,Nombre,Codigo from procedimiento$empresa");
  	$error=0;
    $haz=0;
    $note=0;
 $ID=$_SESSION['id_empleado'];

$sl =$mysqli->query( "SELECT permiso 
      FROM rol$empresa WHERE fk_usuario='$ID' and permiso='Administrador'");
$val=$sl->num_rows;


 $resultk =$mysqli->query(  "SELECT id_procedimiento from procedimiento$empresa");
        $haz=$resultk->num_rows;
        
        
 if($haz>30&& $val==0){
echo "ERROR: Se ha superado el limte de 30 procedimientos";

    
    $note=1;
}
else if($haz>70&& $val>0){
echo "ERROR: Se ha superado el limte de 70 procedimentos";
        $note=1;

}
    if($note!=1){
  for($j=0;$f2 = $sql2->fetch_object();$j++){
if($f2->procedimento==$_POST["pros"])
  	$error=1;
	
	if($f2->Nombre==$_POST["nom"])
  	$error=1;
	
	if($f2->Codigo==$_POST["cod"])
  	$error=1;
	
}
  	if($error!=1){

  $sql =$mysqli->query( "INSERT INTO procedimiento$empresa(Codigo,Nombre,procedimiento,Revision,fk_norma) VALUES  ('".$_POST["cod"]."','".$_POST["nom"]."','".$_POST["pros"]."','".$o."','".$_POST["item"]."')");
  echo "Exito";
  	}
  	else
  	echo "Error: Procedimento, nombre o codigo ya existente";
}
 ?>
