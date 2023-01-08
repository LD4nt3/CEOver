<?php
// Check if image file is a actual image or fake image
session_start();
$val=1;

$val=$_SESSION['abc']+1;
$empresa=$_SESSION['empresa'];
  $carpeta = 'imagenestra/empresa/'.$empresa.'/diagramas/'.$val;
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
    $target_dir = "imagenestra/empresa/".$empresa."/diagramas/".$val."/";
$target_file = $target_dir . basename($_FILES["files"]["name"][0]);
$uploadOk = 1;
$TipoArchivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$directorio = opendir("imagenestra/empresa/".$empresa."/".$val."/"); //ruta actual
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
 echo $archi;
unlink("imagenestra/empresa/".$empresa."/diagramas/".$val."/".$archi);
     if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $target_file)) {
        echo "El archivo ". basename( $_FILES["files"]["name"][0]). " se a subido con exito";
    }

else{
 echo "El archivo ". basename( $_FILES["files"]["name"][0]). "NO se a subido con exito";
}
$_SESSION['abc']=$_SESSION['abc']+1;
//header('Location: procedimientos.php');
?>