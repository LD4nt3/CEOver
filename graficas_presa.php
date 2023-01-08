<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
 $empresa=$_SESSION['empresa'];
  $sql =$mysqli->query( "SELECT * FROM departamento$empresa where nombre!='Administracion'");


    
$hola="";
$holi="";
$hola2="";
$hola3="";
$piv=0;
$todo="";
$hol= " 
   <script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {


";

for($i=0;$f = $sql->fetch_object();$i++){//Departamento

$p=0;

$sql4 =$mysqli->query( "SELECT * FROM usuario$empresa where fk_dep='$f->pk_d_id'");
 
       $hola="            
var arr$i = [];
        var data$i = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Daño'],";
        
        for($l=0;$f4 = $sql4->fetch_object();$l++){

   $sql2 =$mysqli->query( "SELECT fk_trabajo,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trabajos,Estado FROM tiempo$empresa where fk_usuario='$f4->id_empleado' ");



     $sql3 =$mysqli->query( "SELECT COUNT(*) as cuenta FROM tiempo$empresa where fk_usuario='$f4->id_empleado'");

   $f3 = $sql3->fetch_object();//cuenta los usuarios que han entregado un trabajo 







        for($o=0;$o<$f3->cuenta;$o++){

             $f2 = $sql2->fetch_object();

        $sql5 =$mysqli->query( "SELECT AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$f2->fk_trabajo'");
            $f5 = $sql5->fetch_object();
if ($f2->Estado=='Entregado' ||  $f2->Estado=='') {
     
            $p=1; 
                   $holi=$holi."
          ['$f2->trabajos',     $f5->calificacion], ";
         $jol2=$jol2."{},";
         
}
      }
    
    }
     $sql23 =$mysqli->query( "SELECT * FROM usuario$empresa where fk_dep='$f->pk_d_id'");//
  


for ($h=0; $f23 = $sql23->fetch_object(); $h++) { 
   $s =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario='$f23->id_empleado'");//selecciona todos los trabajos del usuario en especifico
  


    for ($o=0; $cuenta2 = $s->fetch_object(); $o++) { 
$squ =$mysqli->query( "SELECT  AVG(calificacion) AS calificacion FROM cont$empresa where fk_trabajo='$cuenta2->fk_trabajo'");
   $pro = $squ->fetch_object();

   $total=$total+$pro->calificacion;
   $piv++;
}


  }


if ($p==0) {

          $hola3="
          ]);

        var options$i = {
          title: 'No hay Trabajos Entregados en este Departamento ' , 
 colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
        };

                      arr$i [$i] = new google.visualization.PieChart(document.getElementById('piechart'+$i));

                       arr$i [$i].draw(data$i, options$i);";
}else{
    $total=$total/$piv;
$jol=5-$total;
    $holi=$holi."
          ['Perdida de eficiencia entre todos los trabajos',     $jol ], ";
          $hola3="
          ]);

        var options$i = {
          title: 'Departamento: $f->nombre' , 
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
    $jol2=" ";
  $jol=0;  $jol3=0;     
  $piv=0;           
  }
                      
$cerrar=$hol.$todo."
              
      }
    </script>
"; 

echo $cerrar;
?>