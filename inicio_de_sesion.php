<!DOCTYPE html>
<html>
<head>
  <title>CEOver-inicia sesi&oacute;n</title>
  <style type="text/css">.custom_footer {
                background-color: rgb(238, 238, 238);
                position:fixed;
                bottom: 0;
                width: 100%;
                height: 40px;
                color: black;
             
            }
            .center {
  margin-left: 188px;

}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "327cf059-eb1c-4c13-8396-08802607f832",
    });

  });

</script>
  <script>
  $(function() {

      $.ajax({
   url: 'deleteados.php',
   success: function (response) {//response is value returned from php (for your example it's "bye bye"
    if(response==0){//window.location = "http://ceover.com/home.html";}
    console.log(response);
   }
}); 

      
  });
  </script>
</head>
<body style="background: #BCD4E5">
<div style="background: #7ECADB;border:1px solid #ccc;padding:5px 10px;">&nbsp;<a href="index.html"> </a>
<p style="text-align:center">&nbsp;</p>
</div>

<div class="container">
<div align="center">
<h2><b>Inicio de sesi&oacute;n</b></h2>
</div>

<div class="panel-body"><span><!--?php echo $message; ?--></span>

<form action="" id="hi" class="center">
          <div class="col-xs-10">

<div class="form-group"><label>Correo Electr&oacute;nico</label> <input class="form-control" id="correo" required="required" type="text" /></div>

<div class="form-group"><label>Contrase&ntilde;a</label> <input class="form-control" id="pass" type="password" /></div>
<div id="wuard">&nbsp;</div>
</div>


<div class="form-group">    
          <div class="col-xs-6">
    <button class="btn btn-info" id="login" name="login" type="button" value="Login" >Login</button>

</div>
<div class="col-xs-6">

    <a style="margin-left: 133px;" href="http://ceover.com/recuperar.html" >Recuperar contrase&ntilde;a</a></div>
</div>
    
</form>
</div>
&nbsp;&nbsp;</div>

<p>&nbsp;</p>
<script>
          
           $(document).ready(function () {
         $( "#login" ).click(function() {
             // e.preventDefault();

                    var mail = document.getElementById("correo").value;
                    var pas = document.getElementById("pass").value;

                    var parametros = {
                        "contra": pas,
                        "correo": mail
                    };

$.ajax({
                        type: "POST",
                        url: 'login.php',
                        data: parametros

                    }).done(function (response) {
                        if (response != 0) {            localStorage.clear();
            $("#aqui").html(response);

                        } else {
                            $("#wuard").html('<div class="alert alert-danger">Error: password o correo incorrecto(s)</div>');
                        }


                    }).fail(function () {
                        $("#wuard").html('<div class="alert alert-danger">Error</div>');

            
                    });              // alert("entrando");                           


                });
            });
        </script>

<div class="custom_footer" data-position="fixed" data-role="footer" data-tap-toggle="false" data-theme="b">
<p style="text-align: right;"><a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">Aviso legal</a>&nbsp;&nbsp;|<a href="https://img.youtube.com/vi/_ESprkRgmjU/mqdefault.jpg">&nbsp;Terminos y condiciones&nbsp;<br />
<img alt="mail" height="23" src="http://iblogbox.github.io/js/htmleditor/ckeditor-4.4.7/plugins/smiley/images/envelope.png" title="mail" width="23" /></a>ploisla8989@gmail.com</p>
<div id="aqui">
    
</div>
</div>
</body>
</html>
