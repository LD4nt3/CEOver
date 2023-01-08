<?php

$dbcon = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");$dbcon->set_charset('utf8');

session_start();
 $empresa=$_SESSION['empresa'];
$ult=1;
if(isset($_POST["submit"]))
{
  $numero=$_POST["checkbox"];
  $lon=count($numero);
for ($i = 0; $i <$lon ; $i++) {//recibimos arreglo de los datos selecionados en orden y guardamos su total en un arreglo

$a=$numero[$i]+1;
$x[$i]=$a;     
$sql = "UPDATE vistas$empresa SET activado=1 WHERE pk_vista='$a'"; mysqli_query($dbcon,$sql); 


 //$sql = "UPDATE `permisos-co` SET `activado`=0 WHERE pk_perm='$numero[$i]'"; mysqli_query($dbcon,$sql);
//$sql = "UPDATE permisos_co SET activado=0 WHERE activado=1 and pk_perm!='$a' "; mysqli_query($dbcon,$sql);               
}
    $z=0;
$xd=0;
$ese=1;
if($lon==0){
   while(5>$ese){
         
                $sql = "UPDATE vistas$empresa SET activado=0 WHERE pk_vista='$ese' "; mysqli_query($dbcon,$sql);
          $ese++;
        }    
    
}
else
for ($e = 0; $e < $lon+1; $e++) {//se hace update en activado depndiendo si el numero de campos selecionados en su valor
//en el cual todos los numeros menores al numero selecionado se desactivan que indica que no se seleciono y se debe aumentar en uno al final z para saltar el valor que se tenia de resultado 
         

      while($x[$e]>$z ){
    
                $sql = "UPDATE vistas$empresa SET activado=0 WHERE pk_vista='$z' ";
                mysqli_query($dbcon,$sql);
          $z++;
        }
        
        $z=$x[$e]+1;
   
        if( $e==$lon){                                  
             $z=$x[$e-1]+1;

                       while(5>$z ){

                                  $sql = "UPDATE vistas$empresa SET activado=0 WHERE pk_vista='$z' ";
                                mysqli_query($dbcon,$sql);
                                $z++;
                           
                       }
                      
                }
                    
  }

}
   header("location:informes.html");

?>




