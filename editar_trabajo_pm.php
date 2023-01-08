<?php 
session_start();
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");

$olo=$_POST["pipo1"];
$olo2=$_POST["pipo2"];


$sql2 =$mysqli->query( " SELECT * FROM tiempo$empresa WHERE fk_trabajo='$olo' AND fk_usuario='$olo2'");
$f2 = $sql2->fetch_object();

echo"<form id='ji' enctype='multipart/form-data' >
<div align='center'>Estado del trabajo: <select id='item' name='item'><option value='$f2->Estado'>$f2->Estado</option>

<option value='Entregado'>Entregado</option>
<option value='Tarde'>Tarde</option>
<option value='Con problemas'>Con problemas</option>
<option value='En Proceso'>En Proceso</option>
<option value='No entregado'>No entregado</option>


</select></div>




<h3><p style='text-align: center;'><b><u>Descripcion:</u></b></p></h3>
  <div id='hi'><p><br>&nbsp;<textarea  rows='4' cols='43' id='desc'  name='desc' required>$f2->DescribeT</textarea></p></div>


 <h3><p style='text-align: center;'><b><u>Observaciones:</u></b></p></h3>
  <div id='hi'><p><br>&nbsp;<textarea  rows='3' cols='43' id='obs'  name='obs' required>$f2->Observaciones</textarea></p></div>





<p style='margin-left: 80px;'><b>Fecha de inicio:&nbsp; &nbsp; </b> <input id='fechai' name='fechai' type='date' value='$f2->tiempo_i' />
<b><u>Hora Inicial</b></u>:<input type='time' id='horai' name='horai' value='$f2->hora_i'>
<br/><b>Fecha de entrega:</b><input id='fechaf' name='fechaf' type='date' value='$f2->tiempo_f'  />
<b><u>Hora Final</b></u>:<input type='time' id='horaf' name='horaf' value='$f2->hora_f'><br>



 

       </form> 
     

  </div>



<div align='center'><button onclick='hola2()'>Terminar de editar </button></div>
<form id='ji2' enctype='multipart/form-data'></form>";

?>