<?php 
session_start();
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
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
      .center {
    text-align: center;
}
      table {
    margin-left:auto; 
    margin-right:auto;
 border-collapse: separate; border-spacing: 10px;        
     text-align: justify;


}
   td {
 column-span: all;
  display: table-cell;
    vertical-align: top;
     line-height: 1 .2;

}
th {  font-weight: normal;
    vertical-align: bottom;
    line-height: 3 .2;
}
      #cajon1{
float:left;

}
#cajon2{
float:both;
}
[data-title] {
 
  position: relative;
  cursor: help;
}

[data-title]:hover::before {
  content: attr(data-title);
  position: absolute;
  bottom: -26px;
  display: inline-block;
  padding: 3px 6px;
  border-radius: 2px;
  background: #000;
  color: #fff;
  font-size: 12px;
  font-family: sans-serif;
  white-space: nowrap;
}
[data-title]:hover::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 8px;
  display: inline-block;
  color: #fff;
  border: 8px solid transparent;  
  border-bottom: 8px solid #000;
}
  </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
   url: 'YMCAEM.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response==0){window.location = "http://ceover.com/home.html";}
    console.log(response);
   
       if(response=='Administrador'){}
    console.log(response);
   
       if(response=='Encargado'){}
    console.log(response);
   
    if(response=='Co-Administrador'){window.location = "http://ceover.com/home.html";}
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

<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li><a href='perfilAdmin.html' >  &nbsp;Regresar a tu perfil&nbsp;&nbsp;&nbsp;  </a></li>

 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>

  </div>
</nav><?php
$valaux=-1;
$x=$_SESSION['contar']; 
for ($i =0; $i< $x+1; ++$i) { 
   if(isset( $_POST["$i"])){
 $valaux=$i;
  }
}
//permisos coadmin numero x de puntos comparar y consultar siempre paginas if else empleado coadmin,ect y evitar que se cambie su permisos o los del admin
// y como se crea la cuenta admin?? y un usuario unico y agregar en crear innsert rol empleado?? y borrar o no o if no puesto es igual empleado?
//si es = -1 significa que no se esta recibiendo info y se queda la variable con su valor original de la sesion
if($valaux!=-1)
 $_SESSION['us']=$valaux;

$val=$_SESSION['us'];


$nD=$mysqli->query( "SELECT nombre from usuario$empresa where id_empleado= '$val';");
 for($i=0;$f = $nD->fetch_object();$i++){ 
 $nom=$f->nombre;
  }

 echo "<p style='text-align: center;'><span style='font-size:24px;'><b>&iexcl;Este es el empleado:  $nom </b></span><b style='font-size: 24px;'>!&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b><a href='https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg' style='background-color: rgb(238, 238, 238); color: rgb(35, 82, 124); text-decoration-line: underline; outline: 0px; text-align: center; font-family: tahoma, geneva, sans-serif;'><span style='background-color: rgb(173, 216, 230);'></span></a><b style='font-size: 24px;'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp</b><a href='https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg' style='background-color: rgb(238, 238, 238); font-family: tahoma, geneva, sans-serif; text-align: center;'><span style='background-color: rgb(173, 216, 230);'></span></a></p>
<hr2></hr2>";
?>

<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>



<form id="myform" action="Editar_emp-p.php" enctype="multipart/form-data" method="post">  

<?php

$sql =$mysqli->query( "SELECT *, (select nombre from departamento$empresa  where pk_d_id=fk_dep) as ndep FROM usuario$empresa where  id_empleado='$val';");



    
 for($i=0;$f = $sql->fetch_object();$i++){ 
  echo"
<table >

  <tbody>

    <tr>  
    <td >
      Nombre: <input type='text' class='form-control' Name='nombre' value= '$f->nombre' >      
      </td> 
      <td width='100'>&nbsp;
      </td>

    <td >
    <img alt='' height='115' src='https://languages.opensuse.org/images/8/84/Icon-merge.png' width='115' class='izq' />
      </td>

      <td width='100'>&nbsp;</td>
    
<td >
      Domicilio: <input type='text' class='form-control' Name='domicilio' value= '$f->domicilio'>      
      </td> 

      <td width='100'>&nbsp;</td>
    
<td >
      </td> 
 </tr> 
 <tr>  
    <td >
      Apellido materno: <input type='text' class='form-control' Name='apem' value= '$f->apellido_m'>      
      </td> 
      <td width='100'>&nbsp;
      </td>

    <td width='100'>&nbsp;
      </td>
      <td width='100'>&nbsp;</td>
    
<td >
      Telefono: <input type='text' class='form-control' Name='cel' value= '$f->celular'>      
      </td> 

      <td width='100'>&nbsp;</td>
    
<td >
    &nbsp; </td>

      </td> 
 </tr> 

 <tr>  
    <th>
      Apellido paterno: <input type='text' class='form-control' Name='apep' value= '$f->apellido_p'>      
      </th> 
      <th width='100'>&nbsp;
      </th>

    <th >
  Cambia la imagen del empleado
      </th>

      <th width='100'>&nbsp;</th>
    
<th >
      Correo: <input type='text' class='form-control' Name='correo' value= '$f->correo'>      
      </th> 

      <th width='100'>&nbsp;</th>
    
<th ><span data-title='Si se cambia el departamento de algun usuario con puesto encargado, este perdera su puesto'>Departamento: <select name='depas'>
  <option value='$f->fk_dep'>$f->ndep</option>" ;

  $sql3=$mysqli->query( "SELECT pk_d_id,nombre from departamento$empresa");

 for($i=0;$h = $sql3->fetch_object();$i++){ 
  if($f->fk_dep!=$h->pk_d_id)
  echo"
  <option value='$h->pk_d_id'>$h->nombre</option>";
}

  echo"
</select>
       </span>
      </th> 
    

 </tr> 
   
            
    <tr><td width='100'>&nbsp;</td>   
    <td width='100'>&nbsp;</td>
<td >

<input type='submit' name='$f->id_empleado' value='Terminar edicion' />  </td>
<td width='100'>&nbsp;</td>
<td width='100'>&nbsp;</td>
<td width='100'>&nbsp;</td>
    </tr>
     </tbody>
</table>
<div class='der'>


";
   $_SESSION['dep']=$f->fk_dep;
 }

?>

</form>
     <p><hr2></hr2></p> 
<p>&nbsp;</p>
</body>
</html> 