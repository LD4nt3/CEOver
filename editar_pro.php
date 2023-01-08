  
<?php 
session_start();
 $empresa=$_SESSION['empresa'];
 ?>
<!DOCTYPE html>
<html>
<head>

  <title>Bienvenido</title>
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
h3 {
       text-decoration: underline;
}
      .center {
    text-align: center;
}
       .izq {
margin-left: 90px;      
}
      .cajon1{
float:left;
    text-align: left;


}
.cajon2{
float:both;


}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto ;
  grid-gap: 7.7px;

}
.grid-container > div {
  text-align: center;
  font-size: 30px;
}
  </style>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
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
  <script type="text/javascript">
    


    function habilita(form)

{ 


 document.getElementById("demo").innerHTML = " <div class='image-upload'><label for='file_0'> </label> <button type='button' value='hide'><input  multiple='multiple'  size='20' type='file' name='fileToUpload' id='fileToUpload' /></button>";
}

function deshabilita(form)
{ 
 document.getElementById("demo").innerHTML = " ";
}


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
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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
  <li><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Graficas&nbsp; &nbsp; </a></li>
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

<p>&nbsp;</p>

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Edita el procedimiento de la empresa</b></span><b style="font-size: 24px;">!</b></p>
<hr2></hr2>


<form id="myform" action='' >  
<div class="center">
 
 
<?php
$val=1;
$x=$_SESSION['abc']+1; 
for ($i =0; $i< $x; ++$i) { 
   if(isset( $_POST["$i"])){
 $val=$i;
 $_SESSION['auxi']=$val;
  }
}

$val=$_SESSION['auxi'];

$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT *
      FROM procedimiento$empresa WHERE id_procedimiento='$val' ");

$f = $sql->fetch_object();
$sql2 =$mysqli->query( "SELECT id_norma,norma
      FROM norma$empresa WHERE id_norma=$f->fk_norma ");

$f2 = $sql2->fetch_object();
$s = $f->Revision;
 
echo "
  <p><h2>Codigo de identificacion</h2> </p>
  <input type='text' id='cod'  value='$f->Codigo' size='80' >
   <p><h2>Nombre del procedimiento</h2> </p>
  <input type='text' id='nom'   value='$f->Nombre'size='80'>
  <p><h2>Procedimiento</h2>   
  <textarea  rows='8' cols='43' id='pro'  value='$f->procedimiento'>$f->procedimiento</textarea> 
  <p><h2>Norma Asociada: </h2> </p> 
  <input type='hidden' id='rev'  value='$s'>
";

$sql3 =$mysqli->query(  "SELECT norma,id_norma from norma$empresa  ");
echo "<p ><span style='font-family: &quot;lucida sans unicode&quot;, &quot;lucida grande&quot;, sans-serif;'><b>Norma a la que se relaciona: <select id='item' name='item'><option value=$f2->id_norma> $f2->norma</option> ";
for($i=0;$f3 = $sql3->fetch_object();$i++){

echo "<option value=$f3->id_norma> $f3->norma</option>";
}
echo"</select></span><br />";
    
 
$directorio = opendir("imagenestra/empresa/$empresa/diagramas/$f->id_procedimiento/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo "<h2>El Diagrama Guardado se llama: ".$archivo . "</h2><br />";
        $archi=$archivo;  
    }
}
   
echo "<h2>Cambiar Diagrama. <input name='form' id='checkbox2' type='checkbox' value='form'  onchange='if(this.checked == true){habilita(this.form)} else{deshabilita(this.form)}' /> </h2>";

      
?>

</p>

<div id="demo"></div>
<button id="submit"> Terminar edicion </button></div></form>

<script>
$(function()
{
        document.getElementById("submit").onclick = function () {
    
      var message = document.getElementById("pro").value;
      var message1 = document.getElementById("cod").value;
      var message2 = document.getElementById("nom").value;
      var norma = document.getElementById("item").value;
       var message3 = document.getElementById("rev").value;
        var parametros={

                "pros" : message,
                  "cod" : message1,
                  "nom" : message2,
                     "rev" : message3,
                     "norma" : norma

    };

          

   
    $.ajax({
    type: "POST",
    url: 'editar_pro_p.php',
    data: parametros ,  

                   success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    alert("Exito al editar el procedimiento ");
                }
});
    const url = 'file3.php';


    const files = document.querySelector('[type=file]').files;
    alert("Su archivo se ha guardado");
    if (files!=null) {
    const formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        let file = files[i];

        formData.append('files[]', file);
   
    }

    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => {
        window.location='editar_pro.php';        console.log(response);

    });
    }


  return true;
   
    
     };
});
</script>
</div>

<p><hr2></hr2></p>

</body>
</html>
