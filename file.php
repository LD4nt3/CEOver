<?php
session_start();
$olo=$_SESSION["name"];
$empresa=$_SESSION['empresa'];

// Check if image file is a actual image or fake image

    $target_dir = "imagenestra/empresa/$empresa/$olo/";
$target_file = $target_dir . basename($_FILES["files"]["name"][0]);
$uploadOk = 1;
$TipoArchivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$directorio = opendir("imagenestra/empresa/$empresa/$olo/"); //ruta actual
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

unlink('imagenestra/empresa/'.$empresa.'/'.$olo.'/'.$archi);
     if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $target_file)) {
        echo "El archivo ". basename( $_FILES["files"]["name"][0]). " se a subido con exito";
    }

else{
 echo "El archivo ". basename( $_FILES["files"]["name"][0]). "NO se a subido con exito";
}
//$_SESSION["id_trabajo"]=$olo;
echo"3";
?>