<?php 
session_start();
 $empresa=$_SESSION['empresa'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>CEOver-procedimientos</title>
  <style type="text/css">footer {
  background-color: rgb(238, 238, 238);
  position:fixed;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: black;
}
hr2 { 
    display: block;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 5em;
    margin-right: 5em;
    border-style: inset;
    border-width: 2px;
}
hr3{ 
  
    border:         none;
    border-left:    1px solid hsla(200, 10%, 50%,100);
    height:         100vh;
    width:          1px;       
}
      .center {
    text-align: center;
}
       .izq {
margin-left: 90px; 
float:left;     
}
      #cajon1{
float:left;

}
#cajon2{




}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
margin-left: 90px;
margin-right: 90px;
  padding: 0.1px;
}

.grid-item {

  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 20px;
  text-align: center;
}
  </style>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" />  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  $(function() {

      $.ajax({
   url: 'red.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response==0){window.location = "http://ceover.com/home.html";}
    console.log(response);
   }
}); 

      
  });
  </script>
</head>
<body background="https://www.beautycolorcode.com/8ed8e8.png" style="cursor: auto;">
<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p>
</div>

<?php  

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");

$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fa = $sq->fetch_object();
if($fa->permiso=='Administrador'){
    echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Puntuaciones&nbsp;   </a></li>
  <li ><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
 <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
 <li ><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li class='active'><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Historial 
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
          <a class='dropdown-item' href='usuarios_agregados.php'>Empleados Nuevos</a>
          <a class='dropdown-item' href='usuarios_eliminados.php'>Empleados Eliminados</a>
      </li>  
 

 <li><a href='Respaldo.php' >  &nbsp; Respaldo de la empresa&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";
}else if($fa->permiso=='Encargado' || $fa->permiso=='Co-Administrador'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
  <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
   <li><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li  class='active'><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";}
else{
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li ><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
 <li><a href='chateando.html' >  &nbsp; Chat&nbsp; &nbsp; </a></li>
 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav>";
}
?>
<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>
<?php
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$combel=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==2 && $fol->activado==1){$comback=1;}
    if($fol->pk_perm==10 && $fol->activado==1){$combel=1;}
}
if($fa->permiso=='Administrador' || $fa->permiso=='Encargado'){echo"<p style='text-align: right; margin-right: 90px;'><span style='font-size:24px;'><b>&iexcl;Estos son los procedimientos de la empresa!</b><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b><a href='agregar_pro.php' style='background-color: rgb(238, 238, 238); font-family: tahoma, geneva, sans-serif; text-align: right;'><span style='background-color: rgb(173, 216, 230);'>Agrega un nuevo procedimiento</span></a></span></p>
";} else if($comback==1){
echo"<p style='text-align: right; margin-right: 90px;'><span style='font-size:24px;'><b>&iexcl;Estos son los procedimientos de la empresa!</b><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b><a href='agregar_pro.php' style='background-color: rgb(238, 238, 238); font-family: tahoma, geneva, sans-serif; text-align: right;'><span style='background-color: rgb(173, 216, 230);'>Agrega un nuevo procedimiento</span></a></span></p>
";
}else{echo"<p style='text-align: right; margin-right: 90px;'><span style='font-size:24px;'><b>&iexcl;Estos son los procedimientos de la empresa!</b><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></span></p>
";}

?>
<hr2></hr2>
<div style="overflow:scroll; height:430px;">
<div class="grid-container">

<?php
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT *
      FROM procedimiento$empresa");
    

for($i=0;$f = $sql->fetch_object();$i++){

$sql2 =$mysqli->query( "SELECT id_norma,norma
      FROM norma$empresa where id_norma=$f->fk_norma");
    $f2 = $sql2->fetch_object();
    $squere =$mysqli->query( " SELECT * from procedimiento$empresa where id_procedimiento='$f->id_procedimiento'");
$feo = $squere->fetch_object();
  if($feo->Estado!='Inactivo' ){
echo "

<div class='grid-item'>
<h2><b><u>Procedimiento: </b> </u><br></h2><h3>$f->Codigo </h3>
</div>
<div class='grid-item'>
<h2><b><u>Nombre: <br></b> </u></h2><h3>$f->Nombre </h4>
</div>
<div class='grid-item'>
<h2><b><u>Norma asiociada: <br></b> </u></h2><h3>$f2->norma </h4>
</div>
<div class='grid-item'>
<h2><b><u>Revisi&oacute;n: <br></b> </u></h2><h3>$f->Revision </h4>
</div>
<div class='grid-item'>
<h2><b><u>Diagrama: <br></b> </u></h2>

<input type='submit'name='$f->id_procedimiento' value='descargar' form='a2' />
</div>
<div class='grid-item'>";
  if($fa->permiso=='Encargado' || $fa->permiso=='Administrador' ){
  echo"<input type='submit' name='$f->id_procedimiento' value='Editar' form='a1' />
<input type='submit' name='$f->id_procedimiento' value='Eliminar' form='a3' />";
  }else if($combel==1){echo"<input type='submit' name='$f->id_procedimiento' value='Eliminar' form='a3' />
";}else{}


echo"</div>
        " ;
          $_SESSION['abc']=$f->id_procedimiento;
}
  }
?>

</div></div>

<form method='POST' id="a3" action='delete.php'></form>
<form method='POST' id="a2" action='descarga3.php'></form>
<form action="editar_pro.php" id="a1" method="post">
</form>

</div>
<hr2></hr2>

  
</body>
</html>