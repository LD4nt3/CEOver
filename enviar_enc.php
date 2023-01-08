<?php
session_start();
//error_reporting(E_ALL & ~E_NOTICE);
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$empresa=$_SESSION['empresa'];

$o=$_POST["trabajo"];
$pichu="No entregado";


$sql2 = "INSERT INTO trabajo$empresa(trabajo) VALUES  ('".$_POST["trabajo"]."')";
        mysqli_query($mysqli,$sql2);
        $sql3 =$mysqli->query(  "SELECT id_trabajo from trabajo$empresa where trabajo='$o' ");
        $f = $sql3->fetch_object();



  if ($_POST["item"]==0) {
    $ptny = json_decode($_POST["res"]);
    $lim = count((array)$ptny);
    for ($i=0; $i < $lim ; $i++) { 
       $sql = "INSERT INTO tiempo$empresa(tiempo_i,hora_i,tiempo_f,hora_f,fk_trabajo,fk_usuario,Estado,Observaciones) VALUES  ('".$_POST["tiempo_i"]."','".$_POST["hora_i"]."','".$_POST["tiempo_f"]."','".$_POST["hora_f"]."','".$f->id_trabajo."','".$ptny[$i]->pk."','".$pichu."','".$_POST["obs"]."')";
        mysqli_query($mysqli,$sql);
    }
    
  }else{


  $sql = "INSERT INTO tiempo$empresa(tiempo_i,hora_i,tiempo_f,hora_f,fk_trabajo,fk_usuario,Estado,Observaciones) VALUES  ('".$_POST["tiempo_i"]."','".$_POST["hora_i"]."','".$_POST["tiempo_f"]."','".$_POST["hora_f"]."','".$f->id_trabajo."','".$_POST["item"]."','".$pichu."','".$_POST["obs"]."')";
        mysqli_query($mysqli,$sql);
  }

/*
$sql2 = "INSERT INTO trabajo(trabajo) VALUES  ('".$_POST["trabajo"]."')";
        mysqli_query($mysqli,$sql2);
        $sql3 =$mysqli->query(  "SELECT id_trabajo from trabajo where trabajo='$o' ");
        $f = $sql3->fetch_object();

  $sql = "INSERT INTO tiempo(tiempo_i,tiempo_f,fk_trabajo,fk_usuario,Estado,Observaciones) VALUES  ('".$_POST["tiempo_i"]."','".$_POST["tiempo_f"]."','".$f->id_trabajo."','".$_POST["item"]."','".$pichu."','".$_POST["obs"]."')";
        mysqli_query($mysqli,$sql);
*/

?>  