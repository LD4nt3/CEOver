<?php
session_start();
$empresa=$_SESSION['empresa'];
$target_dir = "imagenestra/empresa/$empresa/norma/FILES/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$TipoArchivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["guardar"])) {
    
$directorio = opendir("imagenestra/empresa/$empresa/norma/FILES/"); //ruta actual
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

unlink('imagenestra/empresa/'.$empresa.'/norma/FILES/'.$archi);
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " se a subido con exito";
    }

else
 echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). "NO se a subido con exito";
}

$dir = "imagenestra/empresa/$empresa/norma/FILES/*";
if(isset($_POST["mostrar"])) {
echo "<p align=center>";
 foreach(glob($dir) as $file) {  
  $pathinfo = pathinfo($file);
  $By=((filesize($file))*(.001));
  echo "<br><br>Nombre: ".$pathinfo['filename']."&ensp;&ensp;Extension: ".$pathinfo['extension']."&ensp;&ensp; Directorio: ".$pathinfo['dirname']."&ensp;&ensp; Peso: $By KB";
}
}
echo'<script type="text/javascript">
    alert("Apoyo Guardado");
    window.location.href="agrega_nom.php";
    </script>';
?>