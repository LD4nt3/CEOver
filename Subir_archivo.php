<!DOCTYPE html>
<?php
     session_start();
?>
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
.multiselect {
  width: 100px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet" />
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
<body background="https://www.beautycolorcode.com/8ed8e8.png">
<div style="background:#eee;border:1px solid #ccc;padding:5px 10px;">
<p style="text-align:center"><img alt="" height="118" src="https://cdn.discordapp.com/attachments/448707323125432320/499437628802727955/ohhh3.png" width="1184" /></p>
</div>
<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Ceover</a>
    </div>
    <ul class='nav navbar-nav'>
     
  <li ><a href='perfilAdmin.html' >  &nbsp;Regresa a tu perfil&nbsp; &nbsp; </a></li>

 <li><a href='salir.php' > &nbsp;Salir  </a></li>
 

    </ul>
   
  </div>
</nav>

<footer>
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
</footer>

<p style="text-align: center;">&nbsp;</p>

<p style="text-align: center;"><span style="font-size:24px;"><b>&iexcl;Realiza tu trabajo</b></span><b style="font-size: 24px;">!</b>


</p>
<hr2></hr2>
<form id="ji" enctype="multipart/form-data" >
<div align="center">Estado de tu trabajo: <select id="item" name="item"><option value='En Proceso'>En Proceso</option><option value='Con problemas'>Con problemas</option></select></div>


<div class="grid-container">
<div class='grid-item'>



<h3><p style="text-align: center;"><b><u>Describe tu trabajo:</u></b></p></h3>
  <div id="hi"><p><br>&nbsp;<textarea  rows='4' cols='43' id='desc'  name="desc" required></textarea></p></div>


 <h3><p style="text-align: center;"><b><u>Observaciones:</u></b></p></h3>
  <div id="hi"><p><br>&nbsp;<textarea  rows='3' cols='43' id='obs'  name="obs" required></textarea></p></div>
  </h4>



</div>
<div class='grid-item'>
 
<h3><p style="text-align: center;">Sube tu archivo si requieres subir uno:</p></h3>
  
 
        </form> 
        <form id="ji3" enctype="multipart/form-data">
                 <div class="image-upload"><label for="file_0"> </label>
      <input  oingle='single'  size="20" type="file" name="fileToUpload" id="fileToUpload" /><br><button id='submit'>Guardar archivo</button></div> 
        </form>
     <?php
   //session_start();

     $olo=$_SESSION["name"];
     $empresa= $_SESSION['empresa'];
     
     
     $directorio = opendir("imagenestra/empresa/$empresa/$olo/"); //ruta actual
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
if($archi==""){echo "<h2>No hay archivo guardado</h2>";}else{
  echo "<h2>El archivo guardado es : ".$archi. "</h2><br />";
    echo "<br>  <a href='descarga2.php?file=$archi'>Descargar fichero</a>";}
     ?>
  </div>
  </div>


<div align="center"><input type="submit"form="ji" value="Guardar trabajo"/></div>

<div align="center"><input type="submit" form="ji2"  value="Terminar y subir trabajo"/></div>
<form id="ji2" enctype="multipart/form-data"></form>
 
<script type="text/javascript">
  $(function()
{



  $( "#ji" ).submit(function() {

 var olo = localStorage.getItem('pipo');
 
 var name = localStorage.getItem('pipombre');

  var item = document.getElementById("item").value;
  var desc = document.getElementById("desc").value;
  var obs= document.getElementById("obs").value;


      var parametros={
                "item" : item,
                  "name": olo,
                 "desc" : desc,
                 "nombre": name,
                  "obs" : obs

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'subir_archivo_p.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'trabajos_individuales.html';
                }
});alert("se Guardo con exito");


      return false;

   
    
     });
});
</script>
<script type="text/javascript">
  $(function()
{



  $( "#submit" ).click(function() {

const url = 'file.php';


    const files = document.querySelector('[type=file]').files;
    const formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        let file = files[i];

        formData.append('files[]', file);
   
    }

    fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => {
      console.log(response);
      alert("Tu archivo ha sido guardado.");
       window.location = 'Subir_archivo.php';
    });

return false;
    
     });
});
</script>

<script type="text/javascript">
  $(function()
{



  $( "#ji2" ).submit(function() {

 var olo = localStorage.getItem('pipo');
  var item = document.getElementById("item").value;
  var desc = document.getElementById("desc").value;
  var obs= document.getElementById("obs").value;


      var parametros={
                "item" : item,
                    "name": olo,
                 "desc" : desc,
                  "obs" : obs

    };

          
   $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
   
    $.ajax({
    type: "POST",
    url: 'subir_archivo_final.php',
    data: parametros ,  

                    success:  function (response) { 
 window.location = 'trabajos_individuales.html';
                }
});alert("Se ah entregado tu trabajo");



      return false;
//window.location = 'trabajos_individuales.html';
   
    
     });
});
</script>


<p>&nbsp;</p>


<p><hr2></hr2></p>

<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
