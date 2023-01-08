<?php
header('Access-Control-Allow-Origin: http://192.168.1.73:3000');  
header('Access-Control-Allow-Methods: POST, GET,HEAD,PTIONS,TRACE,CONNECT PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Expose-Headers: x-ripple-user-agent, content-type,x-ripple-user-agent, authorization,x-ripple-user-agent');
session_start(); 
 $empresa=$_SESSION['empresa'];
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die('No se pudo connectar'); $mysqli->set_charset('utf8'); 

$sql =$mysqli->query(  "SELECT (Select trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo,(Select id_trabajo from trabajo$empresa where id_trabajo=fk_trabajo) as trabajo2,(Select archivo from trabajo$empresa where id_trabajo=fk_trabajo) as archivo,(Select nombre from usuario$empresa where id_empleado=fk_usuario) as empleado,estado,tiempo_i,hora_i,hora_f,tiempo_f,observaciones,version,calificado from tiempo$empresa ");
$us=$_SESSION['id_empleado'];
$sqlo =$mysqli->query( "SELECT nombre,apellido_m,apellido_p,celular,correo FROM usuario$empresa where id_empleado ='$us'");
$squl =$mysqli->query( "SELECT * FROM permisos_co$empresa");
$combel=0;
$comeback=0;
for($ll=0;$fol = $squl->fetch_object(); $ll++){
    if($fol->pk_perm==3 && $fol->activado==1){$comback=1;}
    if($fol->pk_perm==8 && $fol->activado==1){$combel=1;}
}
$fo = $sqlo->fetch_object();
$sq =$mysqli->query( "SELECT * FROM rol$empresa where fk_usuario ='$us'");

$fo = $sq->fetch_object();
if($fo->permiso=='Administrador'){
    echo "
      <ul>
              <li><a href='perfilAdmin.html'>Perfil</a></li>
     
            <li><a href='trabajos_generales_encargado.html'>Trabajos</a></li>
      <li><a href='tabla_puntuaciones_usuario.html'>Tabla de puntuaciones</a></li>
      <li><a href='departamento.html'>Departamento</a></li>
       <li><a href='u_agregados.html'>Historial</a></li>
 
      <li><a href='contactos.html'>Mensajes</a></li>
      
      <li><a href='index.html'>Salir</a></li>
      </ul>
    </nav> </header>  ";
}else if($fo->permiso=='Encargado'){
echo "  <ul>
              <li><a href='perfilAdmin.html'>Perfil</a></li>
     
      <li><a href='trabajos_generales_encargado.html'>Trabajos</a></li>
      <li><a href='tabla_puntuaciones_usuario.html'>Tabla de puntuaciones</a></li>
      <li><a href='departamento.html'>Departamento</a></li>

      <li><a href='contactos.html'>Mensajes</a></li>
      
      <li><a href='index.html'>Salir</a></li>
      </ul>";
     
}else{
echo "
      <ul>
              <li><a href='perfilAdmin.html'>Perfil</a></li>
     
      <li><a href='trabajos_generales.html'>Trabajos</a></li>
      <li><a href='tabla_puntuaciones_usuario.html'>Tabla de puntuaciones</a></li>
      <li><a href='departamento.html'>Departamento</a></li>
      <li><a href='contactos.html'>Mensajes</a></li>
      
      <li><a href='index.html'>Salir</a></li>
      </ul>
     ";
    
}
?>