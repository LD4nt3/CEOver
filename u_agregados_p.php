 <?php
 session_start();
 $empresa=$_SESSION['empresa'];

  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
  $mysqli->set_charset("utf8");
  $res="";
  $sql =$mysqli->query( "SELECT nombre,dia,hora
      FROM agregado$empresa");

    for($i=0;$f = $sql->fetch_object();$i++){
    $res=$res." 
    <br>
    <div class='center'>
    <h2><p >Nombre: $f->nombre </p><p>   &nbsp;Fecha: $f->dia     &nbsp;Hora: $f->hora     &nbsp; </p>
    </h2>
    <br>
    </div>  <p><hr2></hr2></p> 
    ";
   } 
 echo $res;

?>