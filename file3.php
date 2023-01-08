<?php
// Check if image file is a actual image or fake image
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

$carpeta = "imagenestra/empresa/$empresa/diagramas/$val";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

    $target_dir = "imagenestra/empresa/$empresa/diagramas/$val/";
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
     if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $target_file)) {
        echo "El archivo ". basename( $_FILES["files"]["name"][0]). " se a subido con exito";
    }

else{
 echo "El archivo ". basename( $_FILES["files"]["name"][0]). "NO se a subido con exito";
}


?>