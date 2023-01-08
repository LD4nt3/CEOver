<?php 
session_start();

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
</nav>




<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>
<p style="text-align: center;"><span style="font-size:24px;"><b>¡Edita tu perfil</b></span><b style="font-size: 24px;">!</b></p>

<hr2></hr2>

<form id="myform" action="editar_perfil_p.php" enctype="multipart/form-data" method="post">  

<?php
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$us=$_SESSION['id_empleado'];
    $sql =$mysqli->query( "SELECT * FROM usuario$empresa where  id_empleado='$us';");

 for($i=0;$f = $sql->fetch_object();$i++){ 
  echo"
<table >

  <tbody>

    <tr>  
    <td >
 Apellido materno: <input type='text' class='form-control' Name='apem' value= '$f->apellido_m'>      
</td> 
      <td width='100'>&nbsp;
      </td>




<td >
      Domicilio: <input type='text' class='form-control' Name='domicilio' value= '$f->domicilio'>      
      </td> 


<td >
<td >
      Contrase&ntilde;a :<input class='form-control' id='pass1' name='pass' type='password'  pattern='.{8,}'    title='8 caracteres mínimo' >      
      </td> 
 </tr> 
 <tr>  
    <th>
     &nbsp;
      </th> 
      <th width='100'>&nbsp;
      </th>
<th >
      Telefono: <input type='text' class='form-control' Name='cel' value= '$f->celular'>      
    </th> 

      <th width='100'>&nbsp;</th>
    <th >
      Confirmación de Contrase&ntilde;a :<input class='form-control' id='pass2'  name='pass2' name='pass' type='password'  pattern='.{8,}'    title='8 caracteres mínimo' >    
      <div id='resp'>
      </div>
      </th> 

 </tr> 

 <tr>  
    <th>
      Apellido paterno: <input type='text' class='form-control' Name='apep' value= '$f->apellido_p'>      
      </th> 
      <th width='100'>&nbsp;
      </th>




<th >
      Correo: <input type='email' class='form-control' Name='correo' value= '$f->correo'       pattern='[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)'
    required title='Ejemplo: test@mail.com'>      
      </th> 

      <th width='100'>&nbsp;</th>
<th >
     <input id='Temr' type='submit' name='Temr' value='Terminar edicion' > 
    </th> 
 </tr> 
   
            
 
     </tbody>
</table>";
   }

?>
</form>
<script>
function checkPasswordMatch() {
    var password = $("#pass1").val();
    var confirmPassword = $("#pass2").val();

    if (password != confirmPassword){
        $("#resp").html("Las contrase&ntilde;as no coinciden");
Temr.disabled = true;
    }
    else
{
            $("#resp").html("Las contrase&ntilde;as coinciden");
Temr.disabled = false;

}
    
}

$(document).ready(function () {
   $("#pass1, #pass2").keyup(checkPasswordMatch);
});


</script>

     <p><hr2></hr2></p> 
<p>&nbsp;</p>
</body>
</html> 