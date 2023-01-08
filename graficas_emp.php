<?php
session_start();
$k=$_SESSION['usu'];
 $empresa=$_SESSION['empresa'];
  $mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
      $sql =$mysqli->query( "SELECT *,(SELECT trabajo FROM trabajo$empresa where id_trabajo=fk_trabajo) as trab FROM tiempo$empresa where fk_usuario=$k");
$hola="";
$holi="";
$hola2="";
$hola3="";
$todo="";
$jol2="";$jol=0;$jol3=0;
$hol= " 
   <script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {


";

for($i=0;$f = $sql->fetch_object();$i++){//calificacion de todos los trabajos
if ($f->Estado=='Entregado' || $f->Estado=='') {
   $sql2 =$mysqli->query( "SELECT fk_trabajo,(SELECT descripcion FROM punto$empresa where id_puntos=fk_punto) as puntos FROM cont$empresa where fk_trabajo='$f->fk_trabajo'");

     $sql3 =$mysqli->query( "SELECT COUNT(*) as cuenta FROM cont$empresa where fk_trabajo='$f->fk_trabajo'");

   $f3 = $sql3->fetch_object();

        $sql4 =$mysqli->query( "SELECT  calificacion FROM cont$empresa where fk_trabajo='$f->fk_trabajo'");

  $sql5 =$mysqli->query( "SELECT  AVG(calificacion) as calificacion FROM cont$empresa where fk_trabajo='$f->fk_trabajo'");
      $f5 = $sql5->fetch_object();
  
       $hola="

       
            
var arr$i = [];
        var data$i = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Daño'],";
        for($o=0;$o<=$f3->cuenta;$o++){

             $f2 = $sql2->fetch_object();
               $f4 = $sql4->fetch_object();

               if ($o==$f3->cuenta) {
               

      $jol=5-$jol;
     
                  $holi=$holi."
          ['Perdida de eficiencia entre todos los puntos',     $jol ], ";
         
          }else
          {
                  $jol=$f5->calificacion;
                   $holi=$holi."
          ['$f2->puntos',     $f4->calificacion], ";
         $jol2=$jol2."{},";
    
          }
                   
              

      }
     

if ($f3->cuenta==0) {
          $hola3="
          ]);

        var options$i = {
          title: 'No hay datos sobre este trabajo' , 
 colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
        };

                      arr$i [$i] = new google.visualization.PieChart(document.getElementById('piechart'+$i));

                       arr$i [$i].draw(data$i, options$i);";
}else{
         
                     $hola3="
          ]);

        var options$i = {
           title: 'Trabajo: $f->trab' ,  
 colors: ['#e0440e','#e6693e', '#ec8f6e', '#136796', '#EF99C8', '#FCF66E', '#D5C88E', '#316793', '#C23628', '#F29311', '#9BC8CB'],
 slices: [$jol2 {color: '#D7D7D7'}],
 is3D:true,chartArea:{left:0,top:30,width:'100%',height:'100%'},
          backgroundColor: '#8ed8e8'
        };

                      arr$i [$i] = new google.visualization.PieChart(document.getElementById('piechart'+$i));

                       arr$i [$i].draw(data$i, options$i);";
                     }
                     $jol3=0;
                     $jol=0;
                      $jol2="";
                       $todo=$todo.$hola.$holi.$hola3;
                       $holi="";
                     }
                      
  }
                      
$cerrar=$hol.$todo."
              
      }
    </script>
"; 

echo $cerrar;
?>