<?php

error_reporting(E_ALL & ~E_NOTICE);
$pas=$_POST["pass"];
$passw=password_hash($pas, PASSWORD_BCRYPT);
$dbcon = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");$dbcon->set_charset("utf8");
     $message = "";
     $der=0;
 


if(isset($_POST["submit"]))
{
    $result = $dbcon->query("SELECT nombre FROM empresa");
    $cont = $result->num_rows;
    $eus=$_POST['ecod'];
    $result = $dbcon->query("SELECT nombre FROM empresa where codigo='$eus'");
    $no = $result->num_rows;
   if($no>0){
   if ($_POST["confirma"]==$_POST["correo"]) {
    # code...
  $us=$_POST['cod'];
  $cor=$_POST["correo"];
   $caux=0;
  for($o=1;$o<=$cont;$o++){
$sql2 = $dbcon->query("SELECT pk_d_id, codigo from departamento$o where codigo='$us'");
$f = $sql2->fetch_object();
  for($k=1;$k<=$cont;$k++){

$sq4 =$dbcon->query(  "SELECT id_empleado from usuario$k where correo='$cor' ");
 $aux=$sq4->num_rows;
 if($aux>0  )
 $caux=1;
}
if ($f->codigo==$us&&$caux!=1) {
	  $sql = "INSERT INTO usuario$o(nombre,apellido_m,apellido_p,domicilio,celular,correo,pass,fk_dep) VALUES  ('".$_POST["nombre"]."','".$_POST["apellido_m"]."','".$_POST["apellido_p"]."','".$_POST["domicilio"]."','".$_POST["celular"]."','".$_POST["correo"]."','".$passw."','".$f->pk_d_id."')";
        mysqli_query($dbcon,$sql);
        
        $resultk =$dbcon->query(  "SELECT id_agregado from agregado$o");
        $haz=$resultk->num_rows;
        
             $h = "-6";// otorga la hora actual, dependiendo de donde te encuentres sera + o - 
	$hm = $h * 60; 
	$ms = $hm * 60;
	$gmdate = gmdate("d/m/Y g:i:s A", strtotime('+30 day')+($ms)); // el mas puede ser cambiado para que se adecue con tu zona horaria.
	$dia=substr($gmdate,0,-19);
	$hora=substr($gmdate,11);
	$fech = str_replace( "/", "",$dia); 
        if($haz>100)
        {    
               $row = $resultk->fetch_object();
               $dela=$row->id_agregado;
              $mysqli->query( "DELETE FROM agregado$o where id_agregado='$dela' ");
        }       
        $sql = "INSERT INTO agregado$o(nombre,apellido_m,apellido_p,domicilio,celular,correo,pass,dia,hora) VALUES  ('".$_POST["nombre"]."','".$_POST["apellido_m"]."','".$_POST["apellido_p"]."','".$_POST["domicilio"]."','".$_POST["celular"]."','".$_POST["correo"]."','".$passw."','".$fech."','".$hora."')";

        mysqli_query($dbcon,$sql);
$nom=$_POST["nombre"];

$sql3 =$dbcon->query(  "SELECT id_empleado,nombre,correo from usuario$o where nombre='$nom' AND correo='$cor' ");
$f2 = $sql3->fetch_object();

  $carpeta = 'imagenestra/empresa/'.$o.'/Usuario/'.$f2->id_empleado;
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
 echo "<SCRIPT> 
alert('Creaste tu cuenta correctamente');
</SCRIPT>";
header('location: inicio_de_sesion.php');
}else{

    $der=1;
}

}
  }else
       $message = '<div class="alert alert-danger">los correos no son iguales</div> $caux';
       if( $der==1)
         $message = "<div class='alert alert-danger'>Clave de departamento erronea</div>";
if($caux==1)
         $message = "<div class='alert alert-danger'>Correo ya existente</div>";
}
else
{
            $message = "<div class='alert alert-danger'>Clave de empresa erronea</div>";
 
}


}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrate</title>
  <style type="text/css">footer {
  background-color: rgb(238, 238, 238);
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: black;
}
.pad {

     width: 600px;
 margin: auto;
}
.blur {
    -webkit-filter: blur(5px); /* Safari 6.0 - 9.0 */
    filter: blur(5px);
}
  </style>
</head>
<body  background="https://cdn.discordapp.com/attachments/429086087479296012/538542562307211285/asasdads.png">
<div style="background: #9DCBD8;border:1px solid #ccc;padding:5px 10px;">&nbsp;<a href="home.html">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p></a>
</div>

<div class="pad">


<div color="#7976A9">
<p class="panel-heading">&nbsp; &nbsp; &nbsp;<span style="font-size:27px;color:#000000  ;">&nbsp; &nbsp;&nbsp;&iexcl;Crea una cuenta y &uacute;netenos!</span></p>

<div class="panel-body"><span><!--?php echo $message; ?--></span>

 <form method="post" enctype="multipart/form-data">
  <span style="color:#000000"><label>Nombre</label></span><input class="form-control" id="nombre" name="nombre" type="text" required/>
  <span style="color:#000000"><label>Apellido paterno</label></span><input class="form-control" id="apellido_p" name="apellido_p" type="text" required/>
  <span style="color:#000000"><label>Apellido materno</label></span><input class="form-control" id="apellido_m" name="apellido_m" type="text" required/>
  <span style="color:#000000"><label>Domicilio</label></span><input class="form-control" id="domicilio" name="domicilio" type="text" required/>
<span style="color:#000000;"><b>Tel&eacute;fono</b></span><br />
<input class="form-control" id="celular" name="celular" type="text" required/>

<span style="color:#000000;"><label>Correo Electr&oacute;nico</label></span> <input class="form-control" id="correo" name="correo" type="email"      pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)"
    required title=" Ejemplo: test@mail.com">

<span style="color:#000000;"><b>Confirmaci&oacute;n de Correo Electr&oacute;nico</b></span><br />
<input class="form-control" id="confirma" name="confirma" type="text"required />
<?php 
echo "$message";
?>
<span style="color:#000000;"><label>Contrase&ntilde;a</label></span> <input class="form-control" id="pass" name="pass" type="password"  pattern=".{8,}"   required title="8 caracteres mínimo" />

<span style="color:#000000;"><b>Ingres&aacute; el c&oacute;digo de departamento: </b></span><br />
<input class="form-control" id="cod" name="cod" type="text"required />
<span style="color:#000000;"><b>Ingres&aacute; el c&oacute;digo de tu empresa: </b></span><br />
<input class="form-control" id="ecod" name="ecod" type="text"required />
<h3><span style="font-size:18px;"><span style="color:#000000;"><input name="term" type="checkbox" value="acepto los terminos y condiciones" required/>Acept&oacute; los t&eacute;rminos y condiciones</span></span></h3>


<div class="form-group"><input class="btn btn-info" id="submit" name="submit" type="submit" value="Ingresar" /></div>

</form>
</div>
</div>
</div>

<p>&nbsp;</p>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>
</body>
</html>
