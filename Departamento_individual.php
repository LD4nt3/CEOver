
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
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
      .center {
    text-align: center;
}
       .izq {
margin-left: 90px;      
}
      #cajon1{
float:left;

}
#cajon2{
float:both;


}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto ;
margin-left: 90px;
margin-right: 90px;

}
.grid-item {

  font-size: 20px;

}
	</style>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
session_start();
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
 $empresa=$_SESSION['empresa'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo,fk_dep FROM usuario$empresa where id_empleado ='$us'");
$fo = $sqlo->fetch_object();
$sqlo =$mysqli->query( "SELECT * FROM departamento$empresa where pk_d_id ='$fo->fk_dep'");
$back = $sqlo->fetch_object();
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$mod=0;
$eli=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==4 && $fol->activado==1){$comeback=1;}
    if($fol->pk_perm==5 && $fol->activado==1){$mod=1;}
    if($fol->pk_perm==9 && $fol->activado==1){$eli=1;}
}

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
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
 <li><a href='informes.html' >  &nbsp; Informe mensual&nbsp; &nbsp; </a></li>
 <li><a href='Normas.php' >  &nbsp; Normas&nbsp; &nbsp; </a></li>
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
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
 <li><a href='graficas_presa.html' >  &nbsp; Gr&aacute;ficas&nbsp; &nbsp; </a></li>
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
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Perfil&nbsp; &nbsp; </a></li>
";
if($fa->permiso=='Co-encargado'){echo"<li><a href='trabajos_generales_encargado.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}else{
echo"<li><a href='trabajos_generales.html' >  &nbsp;Trabajos&nbsp;&nbsp;&nbsp;  </a></li>";}echo"
  <li><a href='tabla_puntuaciones_usuario.html' > Tabla de Puntuaciones&nbsp;   </a></li>
  <li class='active'><a href='Departamentos.php' >  &nbsp; Departamentos&nbsp; &nbsp; </a></li>
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
$val=1;
$x=$_SESSION['conta']+1; 
for ($i =0; $i< $x; ++$i) { 
   if(isset( $_POST["$i"])){
 $val=$i;
  }
  
}


$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$sql =$mysqli->query( "SELECT nombre,id_empleado,correo,domicilio,celular, (select nombre from departamento$empresa  where pk_d_id=fk_dep) as ndep, (select calificacion from puntuacion$empresa  where id_lugares=1) as  puntuacion FROM usuario$empresa where fk_dep IN (select pk_d_id from departamento$empresa where pk_d_id = '$val' );");
$sqlK =$mysqli->query( "SELECT pk_d_id,nombre from departamento$empresa where pk_d_id = '$val'");
$fk = $sqlK->fetch_object();

       if($fk->nombre=='Administracion'){
        
           $fa->permiso='Empleado';}
    if($fa->permiso=='Administrador'  || $fa->permiso=='Co-Administrador'){

         for($i=0;$f = $sql->fetch_object();$i++){ 

                       
       $target_dir = "imagenestra/empresa/$empresa/Usuario/$f->id_empleado/";

$directorio = opendir("imagenestra/empresa/$empresa/Usuario/$f->id_empleado/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        $archi=$archivo;
    }
}
  if($i==0){
      
      if($fa->permiso=='Administrador'){
    echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Este es el departamento: <u> $f->ndep  </u>  </b></span>Editar los permisos del <a href='permisos.php'> Co-administrador</a>&nbsp;&nbsp;<a href='agrega_empleado.php'>Agrega un empleado</a>";}
    else if($comeback==1){    echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Este es el departamento: <u> $f->ndep</u>  </b></span>&nbsp;&nbsp;<a href='agrega_empleado.php'>Agrega un empleado</a>";
}else{
    echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Este es el departamento: <u> $f->ndep </u>  </b></span>";
  }
  
  }
  
   
  $enc =$mysqli->query( "SELECT * from rol$empresa");
      //////////////////////
  for($oo=0; $enca = $enc->fetch_object();$oo++){
      if($enca->permiso=='Encargado'){
       $iu =$mysqli->query( "SELECT id_empleado FROM usuario$empresa where fk_dep IN (select pk_d_id from departamento$empresa where pk_d_id = '$val' );");
         for($i=0;$au = $iu->fetch_object();$i++){ 
      if($au->id_empleado==$enca->fk_usuario){
          $encar=$enca->fk_usuario;
          $e=1;
              }
      }
  }
  }
  
  
  /////////////////////

  $s =$mysqli->query( "SELECT permiso from rol$empresa  where fk_usuario='$f->id_empleado'");
    
if ( isset($archi)==false) {
    
        echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/INICIO.png' width='115'/><br><br>";
    if($fa->permiso=='Administrador'){
   echo"
    <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";
    }else if($eli==1){ if($f->id_empleado!=$us){  echo" <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";}}else{}
   
  echo" </div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    if($p->permiso=='Co-Administrador'){$coa=1;}
    if($p->permiso=='Co-encargado'){$coe=1;}

   echo" $p->permiso";
  
   }
   

   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>";
         if($fa->permiso=='Administrador'){
   echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";
   }else if($mod==1){if($f->id_empleado!=$us){echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";}}else{}
  echo" </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
            if($fa->permiso=='Administrador'){
        
           if($coe==0){if($f->id_empleado!=$encar ){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}}else{echo"<button onclick='hola6($f->id_empleado)'>Quitar Co-Encargado </button>";}
           if($coa==0){echo"&nbsp;<button onclick='hola2($f->id_empleado)'>Hacer Co-Administrador </button>";}else{echo"<button onclick='hola5($f->id_empleado)'>Quitar Co-Administrador </button>";}
            if($e==0){if($coe==0){echo"&nbsp;<button  onclick='hola4($f->id_empleado)'>Hacer Encargado </button>";}}
            if($f->id_empleado==$encar){echo"&nbsp;<button  onclick='hola7($f->id_empleado)'>Quitar Encargado </button>";}
            }
           echo"</div></div>
   
      </div> 

      ";
  }else{
        if($archi==""){
           echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/INICIO.png' width='115'/><br><br>";
    if($fa->permiso=='Administrador'){
   echo"
   <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";
    }else if($eli==1){   if($f->id_empleado!=$us){echo" <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";}}else{}
   
  echo" </div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    if($p->permiso=='Co-Administrador'){$coa=1;}
    if($p->permiso=='Co-encargado'){$coe=1;}
    

   echo" $p->permiso";
  
   }

   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>";
         if($fa->permiso=='Administrador'){
   echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";
   }else if($mod==1){if($f->id_empleado!=$us){echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";}}else{}
  echo" </div>
   <div class='grid-item'></div>
     <br>
          <div class='grid-item'> <div align='center'>";
           if($fa->permiso=='Administrador'){
          if($coe==0){if($f->id_empleado!=$encar){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}}else{echo"<button onclick='hola6($f->id_empleado)'>Quitar Co-Encargado </button>";}
           if($coa==0){echo"&nbsp;<button onclick='hola2($f->id_empleado)'>Hacer Co-Administrador </button>";}else{echo"<button onclick='hola5($f->id_empleado)'>Quitar Co-Administrador </button>";}
            if($e==0){if($coe==0){echo"&nbsp;<button  onclick='hola4($f->id_empleado)'>Hacer Encargado </button>";}}
            if($f->id_empleado==$encar){echo"&nbsp;<button  onclick='hola7($f->id_empleado)'>Quitar Encargado </button>";}
           }
           echo"</div></div>
   
      </div> 

      ";
            
        }else{
  echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/empresa/$empresa/Usuario/$f->id_empleado/$archi' width='115'/><br><br>";
    if($fa->permiso=='Administrador'){
   echo"
   <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";
    }else if($eli==1){if($f->id_empleado!=$us){   echo" <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";}}else{}
   
  echo" </div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    if($p->permiso=='Co-Administrador'){$coa=1;}
    if($p->permiso=='Co-encargado'){$coe=1;}

   echo" $p->permiso";
  
   }
   

   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>";
         if($fa->permiso=='Administrador'){
   echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";
   }else if($mod==1){if($f->id_empleado!=$us){echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";}}else{}
  echo" </div>
   <div class='grid-item'></div>
     <br>
            <div class='grid-item'> <div align='center'>";
             if($fa->permiso=='Administrador'){
          if($coe==0){if($f->id_empleado!=$encar){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}}else{echo"<button onclick='hola6($f->id_empleado)'>Quitar Co-Encargado </button>";}
           if($coa==0){echo"&nbsp;<button onclick='hola2($f->id_empleado)'>Hacer Co-Administrador </button>";}else{echo"<button onclick='hola5($f->id_empleado)'>Quitar Co-Administrador </button>";}
            if($e==0){if($coe==0){echo"&nbsp;<button  onclick='hola4($f->id_empleado)'>Hacer Encargado </button>";}}
            if($f->id_empleado==$encar){echo"&nbsp;<button  onclick='hola7($f->id_empleado)'>Quitar Encargado </button>";}
        }
           echo"</div></div>
   
      </div> 

      "; $archi=false;
            
        }
      }
      $_SESSION['contar']=$f->id_empleado; $coa=0; $coe=0; 
    }
   
    }
    else if($fa->permiso=='Encargado'){
    for($i=0;$f = $sql->fetch_object();$i++){ 
             
             
                       
       $target_dir = "imagenestra/empresa/$empresa/Usuario/$f->id_empleado/";

$directorio = opendir("imagenestra/empresa/$empresa/Usuario/$f->id_empleado/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        $archi=$archivo;
    }
}
  if($i==0){
    echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Este es el departamento: <u> $f->ndep </u>  </b></span>";
  }

  $s =$mysqli->query( "SELECT permiso from rol$empresa  where fk_usuario='$f->id_empleado'");
    
if ( isset($archi)==false) {
    
        echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/INICIO.png' width='115'/></div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    if($p->permiso=='Co-encargado'){$coe=1;}

   echo" $p->permiso";
  
   }
   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>
   <div align='center'></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
           if($f->ndep==$back->nombre){//condicion del departamento
          if($coe==0){if($f->id_empleado!=$us){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}}else{echo"<button onclick='hola6($f->id_empleado)'>Quitar Co-Encargado </button>";}
}
           echo"</div></div>
   
      </div> 

      ";
  }else{
        if($archi==""){
           echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/INICIO.png' width='115'/></div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    if($p->permiso=='Co-encargado'){$coe=1;}

   echo" $p->permiso";
  
   }
   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>
   <div align='center'></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
       if($f->ndep==$back->nombre){
          if($coe==0){if($f->id_empleado!=$us){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}}else{echo"<button onclick='hola6($f->id_empleado)'>Quitar Co-Encargado </button>";}
}echo"</div></div>
   
      </div> 

      ";
            
        }else{
  echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/empresa/$empresa/Usuario/$f->id_empleado/$archi' width='115'/></div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    if($p->permiso=='Co-encargado'){$coe=1;}

   echo" $p->permiso";
  
   }
   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>
   <div align='center'></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
                if($f->ndep==$back->nombre){
          if($coe==0){if($f->id_empleado!=$us){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}}else{echo"<button onclick='hola6($f->id_empleado)'>Quitar Co-Encargado </button>";}
}echo"</div></div>
   
      </div> 

      "; $archi=false;
            
        }
      }
      $_SESSION['contar']=$f->id_empleado; $coe=0;
    }
   
}else{
  for($i=0;$f = $sql->fetch_object();$i++){ 
             
             
                       
       $target_dir = "imagenestra/empresa/$empresa/Usuario/$f->id_empleado/";

$directorio = opendir("imagenestra/empresa/$empresa/Usuario/$f->id_empleado/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        $archi=$archivo;
    }
}
  if($i==0){
    echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Este es el departamento: <u> $f->ndep </u>  </b></span>";
  }

  $s =$mysqli->query( "SELECT permiso from rol$empresa  where fk_usuario='$f->id_empleado'");
    
if ( isset($archi)==false) {
    
        echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/INICIO.png' width='115'/></div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    

   echo" $p->permiso";
  
   }
   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>
   <div align='center'></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'></div></div>
   
      </div> 

      ";
  }else{
        if($archi==""){
           echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/INICIO.png' width='115'/></div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    

   echo" $p->permiso";
  
   }
   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>
   <div align='center'></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'></div></div>
   
      </div> 

      ";
            
        }else{
  echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='imagenestra/empresa/$empresa/Usuario/$f->id_empleado/$archi' width='115'/></div>
   <div class='grid-item'><b><u>Empleado</b></u>: $f->nombre &nbsp;&nbsp;<br><b><u>Puesto</b></u>:";
      $co =$mysqli->query( "SELECT COUNT(*) as cuenta from rol$empresa  where fk_usuario='$f->id_empleado'");
       $cuenta = $co->fetch_object();
         if($cuenta->cuenta==0){
   
       echo" Empleado";
  }
   for($l=0; $p = $s->fetch_object();$l++){
    

   echo" $p->permiso";
  
   }
   
   echo"&nbsp;<br><b><u>Tel&eacute;fono</b></u>: $f->celular&nbsp; &nbsp;<br><b><u>Domicilio</b></u>:$f->domicilio<br><b><u>Correo</b></u>: $f->correo
     <br><br>
   <div align='center'></div>
   </div>
   <div class='grid-item'>";
   //Puntuacion: $f->puntuacion&nbsp;
   
  echo" </div>
     <br>
           <div class='grid-item'> <div align='center'></div></div>
   
      </div> 


      "; $archi=false;
            
        }
      }
      $_SESSION['contar']=$f->id_empleado;
    }
   
      
}


?>
<form id='ji' action='Editar_emp.php' method='POST'></form>
<p><hr2></hr2></p>
  <script type="text/javascript">

  function hola(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'co_enc.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exitoooo");


      return false;
  };
  
</script>
  <script type="text/javascript">

  function hola2(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'co_admin.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exito");


      return false;
  };
  
</script>
  <script type="text/javascript">

  function hola3(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'eliminar_empleado.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exito");


      return false;
  };
  
</script>
  <script type="text/javascript">

  function hola4(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'Enca.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exito");


      return false;
  };
  
</script>
<script type="text/javascript">

  function hola5(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'e_co_admin.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exito");


      return false;
  };
  
</script>
<script type="text/javascript">

  function hola6(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'e_co_enc.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exito");


      return false;
  };
  
</script>
<script type="text/javascript">

  function hola7(a){

localStorage.setItem("pipo", a);

 var olo = localStorage.getItem('pipo');

   var parametros={
                  "id": olo

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'e_Enca.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'Departamentos.php';
                }
});alert("se Realizo el cambio con exito");


      return false;
  };
  
</script>
<p>&nbsp;</p>
</body>
</html> 