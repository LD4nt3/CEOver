<?php
session_start();
 $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$us=$_SESSION['id_empleado'];
 $empresa=$_SESSION['empresa'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$mod=0;
$eli=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==4 && $fol->activado==1){$comeback=1;}
    if($fol->pk_perm==5 && $fol->activado==1){$mod=1;}
    if($fol->pk_perm==9 && $fol->activado==1){$eli=1;}
}
$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fa = $sq->fetch_object();
 $val=$_SESSION['departa'];

$sql =$mysqli->query( "SELECT nombre,id_empleado,correo,domicilio,celular, (select nombre from departamento$empresa  where pk_d_id=fk_dep) as ndep, (select calificacion from puntuacion$empresa  where id_lugares=1) as  puntuacion FROM usuario$empresa where fk_dep IN (select pk_d_id from departamento$empresa where pk_d_id = '$val' );");
$sqlK =$mysqli->query( "SELECT pk_d_id,nombre from departamento$empresa where pk_d_id = '$val'");
$fk = $sqlK->fetch_object();

           $fa->permiso='Empleado';
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
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/INICIO.png' width='115'/><br><br>";
    if($fa->permiso=='Administrador'){
   echo"
    <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";
    }else if($eli==1){   echo" <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";}else{}
   
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
   }else if($mod==1){echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";}else{}
  echo" </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
            if($fa->permiso=='Administrador'){
           if($coe==0){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}
           if($coa==0){echo"&nbsp;<button onclick='hola2($f->id_empleado)'>Hacer Co-Administrador </button>";}
            if($e==0){echo"&nbsp;<button  onclick='hola4($f->id_empleado)'>Hacer Encargado </button>";}
            }
           echo"</div></div>
   
      </div> 

      ";
  }else{
        if($archi==""){
           echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/INICIO.png' width='115'/><br><br>";
    if($fa->permiso=='Administrador'){
   echo"
   <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";
    }else if($eli==1){   echo" <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";}else{}
   
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
   }else if($mod==1){echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";}else{}
  echo" </div>
   <div class='grid-item'></div>
     <br>
          <div class='grid-item'> <div align='center'>";
           if($fa->permiso=='Administrador'){
           if($coe==0){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}
           if($coa==0){echo"&nbsp;<button onclick='hola2($f->id_empleado)'>Hacer Co-Administrador </button>";}
            if($e==0){echo"&nbsp;<button  onclick='hola4($f->id_empleado)'>Hacer Encargado </button>";}
           }
           echo"</div></div>
   
      </div> 

      ";
            
        }else{
  echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/empresa/$empresa/Usuario/$f->id_empleado/$archi' width='115'/><br><br>";
    if($fa->permiso=='Administrador'){
   echo"
   <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";
    }else if($eli==1){   echo" <button  onclick='hola3($f->id_empleado)'>Eliminar empleado </button>";}else{}
   
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
   }else if($mod==1){echo"<div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>";}else{}
  echo" </div>
   <div class='grid-item'></div>
     <br>
            <div class='grid-item'> <div align='center'>";
             if($fa->permiso=='Administrador'){
           if($coe==0){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}
           if($coa==0){echo"&nbsp;<button onclick='hola2($f->id_empleado)'>Hacer Co-Administrador </button>";}
            if($e==0){echo"&nbsp;<button  onclick='hola4($f->id_empleado)'>Hacer Encargado </button>";}
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
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/INICIO.png' width='115'/></div>
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
   <div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
          if($coe==0){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}
           echo"</div></div>
   
      </div> 

      ";
  }else{
        if($archi==""){
           echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/INICIO.png' width='115'/></div>
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
   <div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
            if($coe==0){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}
           echo"</div></div>
   
      </div> 

      ";
            
        }else{
  echo "<p><hr2></hr2></p> 
  <br> 
  <div class='grid-container'>
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/empresa/$empresa/Usuario/$f->id_empleado/$archi' width='115'/></div>
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
   <div align='center'><input type='submit' name='$f->id_empleado' value='Editar Empleado' form='ji'/></div>
   </div>
   <div class='grid-item'></div>
     <br>
           <div class='grid-item'> <div align='center'>";
           if($coe==0){echo"<button onclick='hola($f->id_empleado)'>Hacer Co-Encargado </button>";}
           echo"</div></div>
   
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
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/INICIO.png' width='115'/></div>
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
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/INICIO.png' width='115'/></div>
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
   <div class='grid-item'><img alt='' height='115' src='http://ceover.com/imagenestra/empresa/$empresa/Usuario/$f->id_empleado/$archi' width='115'/></div>
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