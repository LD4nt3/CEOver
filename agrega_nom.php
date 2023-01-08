<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
//$_SESSION['F']=0;
//$_SESSION['h']=0;

?>

<!DOCTYPE html>
<html>
<head>
	<title>CEOver-nueva norma</title>
 
	<style type="text/css">footer {
  background-color: rgb(238, 238, 238);
  position:fixed;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: black;
}
button[value="hide"]{
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
  grid-template-columns: auto auto;
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
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" />  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
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
    <script>
  $(function() {

      $.ajax({
   url: 'YMCA.php',
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
$empresa=$_SESSION['empresa'];
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
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
 <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
 <li class='active'><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
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
}else if($fa->permiso=='Encargado'){
echo "<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>

  <li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
  <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
   <li><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
 <li><a href='procedimientos.php' >  &nbsp; Procedimientos&nbsp; &nbsp; </a></li>
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
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Agrega una nueva norma y normativas!</b><b style="font-size: 24px;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></span></p>
<hr2></hr2>
<p style=" text-align: center;"><span style="font-size:24px;"><b>&iexcl;Sube o Descarga tu archivo de apoyo de normas!</b><b style="font-size: 24px;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></span></p>

<form action="upload.php" method="post" enctype="multipart/form-data" style="text-align: center;">
  <div>
    <div class="image-upload"><label for="file_0"><img alt="50" data-html="true" data-placement="right" data-title="Click To Choose File" data-toggle="tooltip" data-trigger="hover" height="50" rel="tooltip" style="cursor: pointer;" /> </label><button type="button" value="hide"><input  multiple="multiple"  size="20" type="file" name="fileToUpload" id="fileToUpload" /></button>    <input type="submit" value="Guardar" name="guardar"></form>
      <?php
 
$directorio = opendir("imagenestra/empresa/$empresa/norma/FILES/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo "El archivo anterior fue: ".$archivo . "<br />";
        $archi=$archivo;
    }
}

      echo "  <a href='descarga.php?file=$archi'>Descargar fichero</a>";
      ?>
    
    
    </div>

<p>&nbsp;</p>

<div class="grid-container">
<div class="grid-item">
<h2><b><u>Norma</u></b></h2>
</div>

<div class="grid-item">
<h2><b><u>Normativas</u></b></h2>
</div>
  
<div class="grid-item"><b>Norma nombre:</b><input name="nom_n" type="text" form="hi" /><br><b>Norma Descripcion:</b><br><textarea name="nom" rows="10" cols="50" form="hi" ></textarea></div>



<div class="grid-item"><b>Normativa:&nbsp;</b><br>   
  
<br>

<br>
<br>

<form name="myform" id="myform" onsubmit="return validateForm()" method="post">

<div id="aca"></div> 
    <input type="submit" value="Agregar normativa">
    
</form>

</div>

</div>

<form  action="agrega_nom_p.php" method="POST" id="hi">
<div id="aca2"></div>
<div id="resul">
<p style="text-align: center;"><input type="submit" name="terminar" value="Terminar y agregar"></p></div>


</form>
<p><hr2></hr2></p>



<p>&nbsp;</p>

<script>
  var h=0;
  h=sessionStorage.clickcount=0;
function validateForm() {

  h=sessionStorage.clickcount;


    
    
     if (sessionStorage.clickcount) {
    sessionStorage.clickcount = Number(sessionStorage.clickcount) +1;
} else {
 
    sessionStorage.clickcount = 0;
}    

  var n='normativa'+h;
  var vol="<br><b>Normativa:&nbsp;</b><input name='"+n+"' type='text' form='hi'/><br><br>";
                        $("#aca").append(vol);
                        $("#aca2").append(  "<input type='hidden' id='cust' name='cust' value='"+h+"'>");


 
return  false;

}
</script>

</body>
</html>


