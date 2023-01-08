<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ceover-Normas</title>
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
  grid-template-columns: auto auto ;
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

  <script language="Javascript"> 

function preguntar(elemento){ 

  var item = elemento;



      var parametros={
                "item1" : item

    };
   
    $.ajax({
    type: "POST",
    url: 'delete_norma.php',
    data: parametros ,  

                    success:  function (response) { 
                      window.location.replace("Normas.php");
                }
});

} 
</script> 
</head>
<body background="https://www.beautycolorcode.com/8ed8e8.png" style="cursor: auto;">
<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p>
</div>
<?php  

 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar"); $mysqli->set_charset('utf8'); 
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
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
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
}else if($fa->permiso=='Encargado' || $fa->permiso=='Co-Administrador' ){
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
   <li class='active'><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
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
    if($fol->pk_perm==1 && $fol->activado==1){$comback=1;}
    if($fol->pk_perm==7 && $fol->activado==1){$combel=1;}
}
if($fa->permiso=='Administrador' || $fa->permiso=='Encargado'){echo"<p style='text-align: right; margin-right: 90px;'><span style='font-size:24px;'><b>&iexcl;Estas son las normas y normativas de la empresa!</b><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b><a href='agrega_nom.php' style='text-align: right;'><span style='background-color: rgb(173, 216, 230);'>Agregar nueva Norma y normativa</span></a></span></p>
";} else if($comback==1){
echo"<p style='text-align: right; margin-right: 90px;'><span style='font-size:24px;'><b>&iexcl;Estas son las normas y normativas de la empresa!</b><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b><a href='agrega_nom.php' style='text-align: right;'><span style='background-color: rgb(173, 216, 230);'>Agregar nueva Norma y normativa</span></a></span></p>
";
}else{echo"<p style='text-align: right; margin-right: 90px;'><span style='font-size:24px;'><b>&iexcl;Estas son las normas y normativas de la empresa!</b><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></span></p>
";}

?>
<hr2></hr2>

<div class="grid-container">
<div class="grid-item">
<h2><b><u>Norma</u></b></h2>
</div>

<div class="grid-item">
<h2><b><u>Normativas</u></b></h2>
</div>



<?php 

/*
select (select norma from norma where id_norma=fk_norma)as norma,(select descripcion from norma where id_norma=fk_norma) as descripcion,normativa,fk_norma from normativa where fk_norma=id_norma;
*/

//select (select norma from norma where id_norma=fk_norma)as norma,(select descripcion from norma where id_norma=fk_norma) as descripcion,fk_normativa from con_norma;

$sql2 =$mysqli->query( " SELECT fk_norma,(select norma from norma$empresa where id_norma=fk_norma)as norma,(select descripcion from norma$empresa where id_norma=fk_norma) as descripcion,(select id_norma from norma$empresa where id_norma=fk_norma)as idea,(select normativa from normativa$empresa where id_normativa=fk_normativa)as normativa, COUNT(*) Total FROM con_norma$empresa GROUP BY fk_norma ");

$sql3 =$mysqli->query( " SELECT DISTINCT (select norma from norma$empresa where id_norma=fk_norma)as norma,(select descripcion from norma$empresa where id_norma=fk_norma) as descripcion,(select normativa from normativa$empresa where id_normativa=fk_normativa)as normativa, COUNT(*) Total FROM con_norma$empresa GROUP BY fk_norma ");




for($i=0;$f2 = $sql2->fetch_object();$i++){ 
$sql =$mysqli->query( " SELECT fk_norma,(select normativa from normativa$empresa where id_normativa=fk_normativa)as normativa from con_norma$empresa where fk_norma='$f2->fk_norma'");
$squere =$mysqli->query( " SELECT * from norma$empresa where id_norma='$f2->fk_norma'");
$feo = $squere->fetch_object();
  if($feo->Estado!='Inactivo' ){
  echo "<div class='grid-item'><b><u>Norma:</b></u> $f2->norma <br><b><u>Descripci&oacute;n:</b></u><br> $f2->descripcion <p>";
  if($fa->permiso=='Encargado' || $fa->permiso=='Administrador' ){
  echo"<input type='submit' name='$f2->idea' value='Editar' form='a1' /><button id='$f2->idea' onclick='preguntar($f2->idea)' type='button'>Eliminar</button>";
  }else if($combel==1){echo"<button id='$f2->idea' onclick='preguntar($f2->idea)' type='button'>Eliminar</button>";}else{}
  
  echo"</p></div>
<div class='grid-item'>";
for($i=0;$f = $sql->fetch_object();$i++){ 

  echo "<br><b><u>Normativa:</b></u> $f->normativa  ";

   
} $_SESSION['cba']=$f2->idea;
echo "</div>";
}
  }


 
/*echo "$f->nombre<br />
$f->correo<br />
$f->celular</p>";*/

?>
<form action="editar_nom.php" id="a1" method="post">
</form>

<p>&nbsp;</p>
</div>
<hr2></hr2>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>