
  <?php
session_start();
$empresa=$_SESSION['empresa'];
$vol=$_SESSION['f'];
$val=1;
$x=$_SESSION['abc']+1; 
for ($i =0; $i< $x; ++$i) { 
   if(isset( $_POST["$i"])){
 $val=$i;
 $_SESSION['auxi']=$val;
  }
}

$val=$_SESSION['auxi'];


$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT *
      FROM procedimiento$empresa WHERE id_procedimiento='$val' ");

$f = $sql->fetch_object();

$directorio = opendir("imagenestra/empresa/$empresa/diagramas/$f->id_procedimiento/"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo "El archivo anterior fue: ".$archivo . "<br />";
        $archi=$archivo;
    }
}
echo "";
 $fileName = $archi;
    $filePath = 'imagenestra/empresa/'.$empresa.'/diagramas/'.$f->id_procedimiento.'/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    
  }
  ?>
