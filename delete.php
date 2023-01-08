<?php
session_start();
$val=1;
 $empresa=$_SESSION['empresa'];
$x=$_SESSION['abc']+1; 
for ($i =0; $i< $x; ++$i) { 
   if(isset( $_POST["$i"])){
 $val=$i;
 $_SESSION['auxi']=$val;
  }
}

$val=$_SESSION['auxi'];

$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "UPDATE procedimiento$empresa SET Estado='Inactivo' WHERE id_procedimiento = '$val'");

      $target_dir = "imagenestra/empresa/$empresa/diagramas/$val/";
       $carpeta = "imagenestra/empresa/$empresa/diagramas/$val";
$target_file = $target_dir . basename($_FILES["files"]["name"][0]);
$uploadOk = 1;
$TipoArchivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$directorio = opendir("imagenestra/empresa/$empresa/diagramas/$val/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
        $archi=$archivo;
    }
}

unlink('imagenestra/empresa/'.$empresa.'/diagramas/'.$val.'/'.$archi);
rmdir($carpeta);
header('location: procedimientos.php')
?>