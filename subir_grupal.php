<?php
session_start();
$empresa=$_SESSION['empresa'];

$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 
$us=$_SESSION['id_empleado'];

$sql3 =$mysqli->query(  "SELECT fk_dep from usuario$empresa where id_empleado='$us' ");
$f3 = $sql3->fetch_object();
$sql2 =$mysqli->query(  "SELECT pk_d_id from departamento$empresa where pk_d_id='$f3->fk_dep' ");
$f2 = $sql2->fetch_object();
$sql =$mysqli->query(  "SELECT nombre,apellido_m,apellido_p,id_empleado from usuario$empresa where fk_dep='$f2->pk_d_id' ");
echo "<p style='margin-left: 80px;'>Empleados:&nbsp;
<form>
<div style='margin-left: 300px;' class='multiselect'>
<div class='selectBox' onclick='showCheckboxes()'>
<select>
<option>Tus empleados:</option>
</select>
<div class='overSelect'>
</div>
</div>
<div id='checkboxes'>
 ";
for($i=0;$f = $sql->fetch_object();$i++){

echo "
<input type='checkbox' value=$f->id_empleado class='checks'  />$f->nombre $f->apellido_p $f->apellido_m<br>
";
}
echo"</div>
</div>
</form>
</p>
<br />";

?>