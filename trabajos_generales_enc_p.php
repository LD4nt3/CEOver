<?php
session_start(); 
 $empresa=$_SESSION['empresa'];
$mes=date("m");
$anio=date("Y");
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$sql =$mysqli->query(  "SELECT (Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo,(Select id_trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo2,(Select archivo from trabajo$empresa where id_trabajo=fk_trabajo) as archivo,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as empleado,(Select id_empleado from usuario$empresa where id_empleado=fk_usuario) as empleado2,estado,tiempo_i,hora_i,hora_f,tiempo_f,observaciones,version,calificado from tiempo$empresa ");
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$combel=0;
$comeback=0;
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fo = $sq->fetch_object();
if($fo->permiso=='Co-Administrador'){
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==3 && $fol->activado==1){$comback=1;}
    if($fol->pk_perm==8 && $fol->activado==1){$combel=1;}
}
}




for($i=0;$f = $sql->fetch_object();$i++){
    $d=1;
	$mesA=substr($f->tiempo_f,5,-3);
	$Anio=substr($f->tiempo_f,0,-6);

if ( $mes<=$mesA && $Anio==$anio ) {
if($f->estado==""){$f->estado='calificado';}

echo "


<div class='grid-item'>

<p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img height='107' src='https://languages.opensuse.org/images/8/84/Icon-merge.png' width='107' />$f->archivo</p>

<p style='margin-left: 80px;'><span style='font-family: &quot;lucida sans unicode&quot;, &quot;lucida grande&quot;, sans-serif;'><b>Empleado: </b>$f->empleado</span><br />
<b>Trabajo: </b>$f->trabajo<br/>
<span style='font-family: &quot;courier new&quot;, courier, monospace;'><b>Estado del trabajo:</b> $f->estado</span></p>

<p style='margin-left: 80px;'><b>Fecha de inici&oacute;:&nbsp; &nbsp; </b> <input id='user_date' name='user_date' type='date' value='$f->tiempo_i' disabled /><b><u>Hora Inicial</b></u>:$f->hora_i
<br/><b>Fecha de entrega:</b><input id='user_date' name='user_date' type='date' value='$f->tiempo_f' disabled  /><b><u>Hora Final</b></u>:$f->hora_f<br><b>Observaciones:</b><br> $f->observaciones<br><b>Calificado por:</b><br> $f->calificado<br><b>Versi&oacute;n del trabajo:</b> $f->version</p>


";

	if ($f->estado=='No entregado' || $f->estado=='En proceso' ) {

	}else
	{

////////////

 
 if($d==1){
	if ($f->estado=='Entregado' || $f->estado=='Tarde' || $f->estado=='calificado' ) {
	    
	    
		$hi=$f->trabajo;
	    if($fo->permiso=='Administrador'){}else{
	        
	        if($combel==1){		$hi=$f->trabajo2; $a=$f->empleado2;
echo "<p style='margin-left: 80px;'><span style='text-align: center; font-family: tahoma, geneva, sans-serif;'><div class='pip' id='$hi' value='$hi'><button type='button' onclick='hola($hi)'>Calificar</button><button type='button' onclick='hola2(this)' pipo1='$hi' pipo2='$a'>Editar</button></div></span></p>";
}else if($fo->permiso=='Co-Administrador'){}else{
    if($f->estado!='calificado'){
    $hi=$f->trabajo2; $a=$f->empleado2;
echo "<p style='margin-left: 80px;'><span style='text-align: center; font-family: tahoma, geneva, sans-serif;'><div class='pip' id='$hi' value='$hi'><button type='button' onclick='hola($hi)'>Calificar</button><button type='button' onclick='hola2(this)'  pipo1='$hi' pipo2='$a'>Editar</button></div></span></p>";
}
}
	        
	        
	    }
 
$olo=$f->trabajo2;
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
    echo "<br>  <a href='descarga2.php?file=$archi&name=$olo'>Descargar Archivo del trabajo</a>";
  }
}

	    $hi2=$f->trabajo2;
    $sql2 =$mysqli->query(  "SELECT * from cont$empresa where fk_trabajo='$hi2' ");
  $f2 = $sql2->fetch_object();
if($f2->fk_trabajo==$hi2){
     $sql3 =$mysqli->query(  "SELECT AVG(calificacion) as calificacion from cont$empresa where fk_trabajo='$hi2' ");
  $f3 = $sql3->fetch_object();
  echo"<br><u>La calificaci&oacute;n de este trabajo es de</u>:$f3->calificacion";
}else{
      echo"<br><u>Este trabajo aun no ha sido calificado</u>";
}
     

	}else{
	    $hi2=$f->trabajo2;
    $sql2 =$mysqli->query(  "SELECT * from cont$empresa where fk_trabajo='$hi2' ");
  $f2 = $sql2->fetch_object();
if($f2->fk_trabajo==$hi2){
     $sql3 =$mysqli->query(  "SELECT AVG(calificacion) as calificacion from cont$empresa where fk_trabajo='$hi2' ");
  $f3 = $sql3->fetch_object();
  echo"<br><u>La calificaci&oacute;n de este trabajo es de</u>:$f3->calificacion";
}else{
      echo"<br><u>Este trabajo aun no ha sido calificado</u>";
}
	}

}

/////////////

}

	    
	}


echo "</div>";

}


?>