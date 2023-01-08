<?php
session_start();
error_reporting(~E_ALL);
 $empresa=$_SESSION['empresa'];
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
  $sql =$mysqli->query( "SELECT * FROM usuario$empresa");
    $piv=0;
    $total=0;
    $c =$mysqli->query( "SELECT * from vistas$empresa");//

for($i=0;$jj = $c->fetch_object();$i++){
    if($jj->pk_vista==1){$mejores=$jj->activado;}
    if($jj->pk_vista==2){$peores=$jj->activado;}
    if($jj->pk_vista==3){$trabajos=$jj->activado;}
    if($jj->pk_vista==4){$EDM=$jj->activado;}
}

$hola="";
$holi="";
$hola2="";
$hola3="";
$todo="";
$hol= " 
   <script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {


";

for($i=0;$f = $sql->fetch_object();$i++){//calificacion de todos los trabajos

   $sql2 =$mysqli->query( "SELECT fk_trabajo,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trabajos,Estado FROM tiempo$empresa where fk_usuario='$f->id_empleado' ");

     $sql3 =$mysqli->query( "SELECT COUNT(*) as cuenta FROM tiempo$empresa where fk_usuario='$f->id_empleado' ");

   $f3 = $sql3->fetch_object();

/////////////////////////////

  $sq =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario='$f->id_empleado'");//selecciona todos los trabajos del usuario en especifico
  
for ($o=0; $cuenta = $sq->fetch_object(); $o++) { 

$squ =$mysqli->query( "SELECT  AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$cuenta->fk_trabajo'");
   $pro = $squ->fetch_object();
   if ($cuenta->Estado=='Entregado') {

   $total=$total+$pro->calificacion;
   $piv++;


}
}
$total=$total/$piv;
/////////////////////////
  if ($total!=0 && $total>4.0 && $mejores==1 || $total<2.7 && $peores==1 ) {
       $hola="

       
            
var arr$i = [];
        var data$i = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Daño'],";
        for($o=0;$o<=$f3->cuenta;$o++){

             $f2 = $sql2->fetch_object();
             $sql5 =$mysqli->query( "SELECT AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$f2->fk_trabajo'");
            $f5 = $sql5->fetch_object();
if ($f2->Estado=='Entregado') {
      
            $jol=$jol+$f5->calificacion;
                   $holi=$holi."
          ['$f2->trabajos',     $f5->calificacion], ";
         $jol2=$jol2."{},";
         $jol3=$jol3+5;
         
}

         

      }
           $jol=$jol3-$jol;
                  $holi=$holi."
          ['Faltante para las 5 estrellas entre todos los trabajos',     $jol ], ";
if ($f3->cuenta==0) {
          $hola3="
          ]);

        var options$i = {
          title: 'No hay datos sobre este empleado' , 
 colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
        };

                      arr$i [$i] = new google.visualization.PieChart(document.getElementById('piechart'+$i));

                       arr$i [$i].draw(data$i, options$i);";
}else{
          $hola3="
          ]);

        var options$i = {
          title: 'Empleado: $f->nombre' , 
 colors: ['#e0440e','#e6693e', '#ec8f6e', '#136796', '#EF99C8', '#FCF66E', '#D5C88E', '#316793', '#C23628', '#F29311', '#9BC8CB'],
 slices: [$jol2 {color: '#D7D7D7'}],
 is3D:true,chartArea:{left:0,top:30,width:'100%',height:'100%'},
          backgroundColor: '#8ed8e8'
        };

                      arr$i [$i] = new google.visualization.PieChart(document.getElementById('piechart'+$i));

                       arr$i [$i].draw(data$i, options$i);";
                     }

                       $todo=$todo.$hola.$holi.$hola3;
                       $holi="";
                      
  }
  $jol3=0;
  $jol2=" ";
  $jol=0;
  $total=0;
$piv=0;
}
                      
$cerrar=$hol.$todo."
              
      }
    </script>
"; 

echo $cerrar;
?>