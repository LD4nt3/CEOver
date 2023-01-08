<?php
session_start();
$empresa=$_SESSION['empresa'];
$olo=$_GET['name'];
echo $olo."hola";
if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = "imagenestra/empresa/$empresa/$olo/$fileName";
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
}

?>