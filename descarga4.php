<?php
session_start();
$empresa=$_SESSION['empresa'];
$directorio = opendir("imagenestra/empresa/$empresa/backup/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo "El archivo anterior fue: ".$archivo . "<br />";
        $archi=$archivo;
    }
}
    $fileName = basename($archi);
    $filePath = 'imagenestra/empresa/'.$empresa.'/backup/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    
}

?>