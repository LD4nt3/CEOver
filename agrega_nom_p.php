<?php
session_start();
$empresa=$_SESSION['empresa'];
//error_reporting(E_ALL & ~E_NOTICE);
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
//$_SESSION['h']=0;
 $nom=$_POST["nom_n"];
 $ID=$_SESSION['id_empleado'];
    $note=0;

for ($i=0; $i<=$_POST["cust"] ; $i++) { 

           $RES=$_POST["normativa".$i];
for ($j=0; $j<=$_POST["cust"] ; $j++) { 
        $RES2=$_POST["normativa".$j];
if($j!=$i){
    if($RES==$RES2)
    $error=1;
}
    }

}


 $ID=$_SESSION['id_empleado'];

$sl =$mysqli->query( "SELECT permiso 
      FROM rol$empresa WHERE fk_usuario='$ID' and permiso='Administrador'");
$val=$sl->num_rows;


$resultk =$mysqli->query(  "SELECT id_norma from norma$empresa");
        $haz=$resultk->num_rows;
 if($haz>30&& $val==0){
echo'<script type="text/javascript">
    alert("ERROR: Se ha superado el limte de 30 normas");
    window.location.href="agrega_nom.php";
    </script>';
    
    $note=1;
}
else if($haz>70&& $val>0){
echo'<script type="text/javascript">
    alert("ERROR: Se ha superado el limte de 70 normas");
    window.location.href="agrega_nom.php";
    </script>';
        $note=1;

}
    if($note!=1){
if($error!=1){
  
 //nombre de la norma
 $sql2 = "INSERT INTO norma$empresa(norma,descripcion) VALUES  ('".$_POST["nom_n"]."','".$_POST["nom"]."')";
       mysqli_query($mysqli,$sql2);
//cust= la sesion para saber cuantas veces se tiene que repetir el for
  for ($i=0; $i<=$_POST["cust"] ; $i++) { 

           $RES=$_POST["normativa".$i];//la normativa actual a insertar

  $sql = "INSERT INTO normativa$empresa(normativa) VALUES  ('".$RES."')";
        mysqli_query($mysqli,$sql);

   $sql5 =$mysqli->query(  "SELECT id_normativa from normativa$empresa where normativa='$RES'");
  $f2 = $sql5->fetch_object();

   $sql4 =$mysqli->query(  "SELECT id_norma FROM norma$empresa where norma='$nom'");
   $f = $sql4->fetch_object();


          $sql3 = "INSERT INTO con_norma$empresa(fk_norma,fk_normativa) VALUES  ('".$f->id_norma."','".$f2->id_normativa."')";
        mysqli_query($mysqli,$sql3);

   
}



              header('Location:Normas.php');
      }else{
      echo'<script type="text/javascript">
    alert("ERROR: Tienes una normativa Repetida");
    window.location.href="agrega_nom.php";
    </script>';
    }
  }else{
      echo'<script type="text/javascript">
    alert("ERROR: Tienes una norma Repetida");
    window.location.href="agrega_nom.php";
    </script>';
    }
echo $note;
//nota el link de redirecion 
?>