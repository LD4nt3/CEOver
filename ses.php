<?php
session_start();
$_SESSION['name']=$_POST["name"];
$olo=$_POST["name"];
$empresa=$_SESSION['empresa'];
$carpeta = "imagenestra/empresa/$empresa/$olo";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
?>