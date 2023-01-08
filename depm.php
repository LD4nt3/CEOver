  <?php
  session_start();
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$us=$_SESSION['id_empleado'];
 $empresa=$_SESSION['empresa'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fa = $sq->fetch_object();
  
  $sql =$mysqli->query( "SELECT nombre,pk_d_id,( SELECT nombre FROM usuario$empresa where id_empleado 
IN (select fk_usuario from rol$empresa where permiso ='Encargado') 
AND fk_dep =pk_d_id) as nombreE,( SELECT apellido_p FROM usuario$empresa where id_empleado 
IN (select fk_usuario from rol$empresa where permiso ='Encargado') 
AND fk_dep =pk_d_id) as apellido_p,( SELECT apellido_m FROM usuario$empresa where id_empleado 
IN (select fk_usuario from rol$empresa where permiso ='Encargado') 
AND fk_dep =pk_d_id) as apellido_m
      FROM departamento$empresa");
      
      

$aux=0;
echo"<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Estos son los departamentos de tu empresa</b></span><b style='font-size: 24px;'>!</b></p>";
for($i=0;$f = $sql->fetch_object();$i++){
echo " 
<div class='pip'>


<b><u>
Departamento</b></u>: $f->nombre    &nbsp;<br><b><u>Encargado</b></u>: $f->nombreE  $f->apellido_p $f->apellido_m    &nbsp; 



<button onclick='hola($f->pk_d_id)'>Ver Departamento </button>
</div>
<hr2></hr2> 
";

    $_SESSION['conta']=$f->pk_d_id;
} 

?>