<?php

$dbcon = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");$dbcon->set_charset('utf8');

$ult=1;
if(isset($_POST["submit"]))
{
  $numero=$_POST["checkbox"];
  $lon=count($numero);
for ($i = 0; $i <$lon ; $i++) {//recibimos arreglo de los datos selecionados en orden y guardamos su total en un arreglo

$a=$numero[$i]+1;
$x[$i]=$a;     
$sql = "UPDATE permisos_coenc SET activado=1 WHERE pk_coenc='$a'"; mysqli_query($dbcon,$sql); 
echo $a;
echo "<br>";

 //$sql = "UPDATE `permisos-co` SET `activado`=0 WHERE pk_perm='$numero[$i]'"; mysqli_query($dbcon,$sql);
//$sql = "UPDATE permisos_co SET activado=0 WHERE activado=1 and pk_perm!='$a' "; mysqli_query($dbcon,$sql);               
}
    $z=0;
$xd=0;
$ese=1;
if($lon==0){
   while(12>$ese){
         
                $sql = "UPDATE permisos_coenc SET activado=0 WHERE pk_coenc='$ese' "; mysqli_query($dbcon,$sql);
          $ese++;
        }    
    
}
else
for ($e = 0; $e < $lon+1; $e++) {//se hace update en activado depndiendo si el numero de campos selecionados en su valor
//en el cual todos los numeros menores al numero selecionado se desactivan que indica que no se seleciono y se debe aumentar en uno al final z para saltar el valor que se tenia de resultado 
              echo "<br>xx ";

              echo$x[$e];

      while($x[$e]>$z ){
           echo "<br>yy ";

              echo$z;
                $sql = "UPDATE permisos_coenc SET activado=0 WHERE pk_coenc='$z' ";
                mysqli_query($dbcon,$sql);
          $z++;
        }
        
        $z=$x[$e]+1;
        echo "<br>r".$z;
        if( $e==$lon){                                   echo "<br>zz".$z;
             $z=$x[$e-1]+1;

                       while(12>$z ){

                                  $sql = "UPDATE permisos_coenc SET activado=0 WHERE pk_coenc='$z' ";
                                mysqli_query($dbcon,$sql);
                                $z++;
                           
                       }
                      
                }
                    
  }

/*
for ($e = 0; $e < 12; $e++) 
{   for ($j = 1; $j < 11; $e++) 
     {
        if($x[$e]==$j)    {
    
    $haz=0;
        }
      
    }
      if($haz==1){
                $sql = "UPDATE permisos_co SET activado=0 WHERE pk_perm='$xd' "; mysqli_query($dbcon,$sql);
                $haz=0;
        }
  }
*/}
   header("location:permisos_coenc.php");

?>
