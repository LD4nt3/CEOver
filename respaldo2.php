<?php
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$result = $mysqli->query("SELECT nombre FROM empresa");
    $cont = $result->num_rows;
for($empresa=1;$empresa<=$cont;$empresa++){
    
        $target_dir = "imagenestra/empresa/".$empresa."/diagramas/".$val."/";
$target_file = $target_dir . basename($_FILES["files"]["name"][0]);
$uploadOk = 1;
$TipoArchivo = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$directorio = opendir("imagenestra/empresa/".$empresa."/".$val."/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
        $archi=$archivo;
    }
}
 echo $archi;
unlink("imagenestra/empresa/".$empresa."/backup/".$archi);
    
$host = 'localhost'; //Host del Servidor MySQL
  $database = 'Ceover'; //Nombre de la Base de datos
  $user = 'id4nt3'; //Usuario de MySQL
  $pass = 'pipomuere666'; //Password de Usuario MySQL
 $dir ='dump.sql';
 $fecha = date("Ymd");
//  $fecha = date("Ymd"); //Obtenemos la fecha y hora para identificar el respaldo
 
  // Construimos el nombre de archivo SQL Ejemplo: mibase_20170101.sql
//  $salida_sql = $db_name.'_'.$fecha.'.sql'; 
  
  //Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
  //$dump = "C:/usr/bin/mysqldump  --user=".$db_user."--password=".$db_pass."--host=".$db_host." ".$db_name."> $salida_sql";

exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} agregado$empresa conexion_men$empresa consejo$empresa cont$empresa con_norma$empresa departamento$empresa eliminado_b$empresa informe$empresa norma$empresa normativa$empresa permisos_co$empresa procedimiento$empresa punto$empresa puntuacion$empresa rol$empresa tiempo$empresa trabajo$empresa usuario$empresa vistas$empresa --result-file={$dir} 2>&1", $salida_sql);
var_dump($salida_sql);
header('Location: dump.sql');

 //Ejecutamos el comando para respaldo
    $zip = new ZipArchive(); //Objeto de Libreria ZipArchive
  
  //Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
  $salida_zip = $empresa.'_'.$fecha.'.zip';
  
  if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
    $zip->addFile("dump.sql"); //Agregamos el archivo SQL a ZIP
    $zip->close(); //Cerramos el ZIP
    unlink("dump.sql"); //Eliminamos el archivo temporal SQL
    
rename ("/home/nvoapn6eavh8/public_html/$salida_zip","imagenestra/empresa/$empresa/backup/$salida_zip");
    } else {
    echo 'Error'; //Enviamos el mensaje de error
  }
 
}

?>