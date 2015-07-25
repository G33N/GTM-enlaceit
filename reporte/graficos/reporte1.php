<?php 
	session_start();
	include_once "../../conexion/php_conexion.php";
	require("../../css/cabecera.php");
	$var=@$_POST['estado'];
	$var2=@$_POST['ano'];
?>

<!DOCTYPE html>
  <head>
<head>
<title>Sistema GTM</title>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<link type="text/css" rel="stylesheet" href="../../css/css/bootstrap.css"/>
     <link href="../../css/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../css/estilos.css" rel="stylesheet">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#graph').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Cantidad',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Trabajos',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'TRABAJOS',
            type: 'column',
            data: [<?php 
			$conexion = mysqli_connect("localhost","root","Seighei7","GTM-DMS");

				$query="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-01-00 00:00' AND '$var2-01-30 23:59'";
			$rs=mysqli_query($conexion,$query);
			$ene=0;
			while ($reg=mysqli_fetch_array($rs)){
				$ene ++;
				
			}
				$query2="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-02-00 00:00' AND '$var2-02-30 23:59'";
			$rs2=mysqli_query($conexion,$query2);
			$feb=0;
			while ($reg=mysqli_fetch_array($rs2)){
				$feb ++;
				
			}
									$query3="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-03-00 00:00' AND '$var2-03-30 23:59'";
			$rs3=mysqli_query($conexion,$query3);
			$mar=0;
			while ($reg=mysqli_fetch_array($rs3)){
				$mar ++;
				
			}
									$query4="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-04-00 00:00' AND '$var2-04-30 23:59'";
			$rs4=mysqli_query($conexion,$query4);
			$abr=0;
			while ($reg=mysqli_fetch_array($rs4)){
				$abr ++;
				
			}
									$query5="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-05-00 00:00' AND '$var2-05-30 23:59'";
			$rs5=mysqli_query($conexion,$query5);
			$may=0;
			while ($reg=mysqli_fetch_array($rs5)){
				$may ++;
				
			}
									$query6="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-06-00 00:00' AND '$var2-06-30 23:59'";
			$rs6=mysqli_query($conexion,$query6);
			$jun=0;
			while ($reg=mysqli_fetch_array($rs6)){
				$jun ++;
				
			}
						$query7="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-07-00 00:00' AND '$var2-07-30 23:59'";
			$rs7=mysqli_query($conexion,$query7);
			$jul=0;
			while ($reg=mysqli_fetch_array($rs7)){
				$jul ++;
				
			}
						$query8="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-08-00 00:00' AND '$var2-08-30 23:59'";
			$rs8=mysqli_query($conexion,$query8);
			$ago=0;
			while ($reg=mysqli_fetch_array($rs8)){
				$ago ++;
				
			}
						$query9="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-09-00 00:00' AND '$var2-09-30 23:59'";
			$rs9=mysqli_query($conexion,$query9);
			$sep=0;
			while ($reg=mysqli_fetch_array($rs9)){
				$sep ++;
				
			}
						$query10="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-10-00 00:00' AND '$var2-10-30 23:59'";
			$rs10=mysqli_query($conexion,$query10);
			$oct=0;
			while ($reg=mysqli_fetch_array($rs10)){
				$oct ++;
				
			}
						$query11="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-11-00 00:00' AND '$var2-11-30 23:59'";
			$rs11=mysqli_query($conexion,$query11);
			$nov=0;
			while ($reg=mysqli_fetch_array($rs11)){
				$nov ++;
				
			}
						$query12="SELECT * FROM orden WHERE ingreso BETWEEN '$var2-12-00 00:00' AND '$var2-12-30 23:59'";
			$rs12=mysqli_query($conexion,$query12);
			$dic=0;
			while ($reg=mysqli_fetch_array($rs12)){
				$dic ++;
				
			}
			?>
			<?php echo $ene?>,<?php echo $feb?>,<?php echo $mar?>,<?php echo $abr?>,<?php echo $may?>,<?php echo $jun?>,<?php echo $jul?>,<?php echo $ago?>,<?php echo $sep?>,<?php echo $oct?>,<?php echo $nov?>,<?php echo $dic?>]

        }, {

            name: '<?php echo $var ?>',
            type: 'spline',
            data: [<?php 
			$conexion = mysqli_connect("localhost","root","Seighei7","GTM-DMS");

				$query="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-01-00 00:00' AND '$var2-01-30 23:59'";
			$rs=mysqli_query($conexion,$query);
			$enefin=0;
			while ($reg=mysqli_fetch_array($rs)){
				$enefin ++;
				
			}
				$query2="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-02-00 00:00' AND '$var2-02-30 23:59'";
			$rs2=mysqli_query($conexion,$query2);
			$febfin=0;
			while ($reg=mysqli_fetch_array($rs2)){
				$febfin ++;
				
			}
						$query3="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-03-00 00:00' AND '$var2-03-30 23:59'";
			$rs3=mysqli_query($conexion,$query3);
			$marfin=0;
			while ($reg=mysqli_fetch_array($rs3)){
				$marfin ++;
				
			}
						$query4="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-04-00 00:00' AND '$var2-04-30 23:59'";
			$rs4=mysqli_query($conexion,$query4);
			$abrfin=0;
			while ($reg=mysqli_fetch_array($rs4)){
				$abrfin ++;
				
			}
						$query5="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-05-00 00:00' AND '$var2-05-30 23:59'";
			$rs5=mysqli_query($conexion,$query5);
			$mayfin=0;
			while ($reg=mysqli_fetch_array($rs5)){
				$mayfin ++;
				
			}
						$query6="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-06-00 00:00' AND '$var2-06-30 23:59'";
			$rs6=mysqli_query($conexion,$query6);
			$junfin=0;
			while ($reg=mysqli_fetch_array($rs6)){
				$junfin ++;
				
			}
						$query7="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-07-00 00:00' AND '$var2-07-30 23:59'";
			$rs7=mysqli_query($conexion,$query7);
			$julfin=0;
			while ($reg=mysqli_fetch_array($rs7)){
				$julfin ++;
				
			}
						$query8="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-08-00 00:00' AND '$var2-08-30 23:59'";
			$rs8=mysqli_query($conexion,$query8);
			$agofin=0;
			while ($reg=mysqli_fetch_array($rs8)){
				$agofin ++;
				
			}
						$query9="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-09-00 00:00' AND '$var2-09-30 23:59'";
			$rs9=mysqli_query($conexion,$query9);
			$sepfin=0;
			while ($reg=mysqli_fetch_array($rs9)){
				$sepfin ++;
				
			}
						$query10="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-10-00 00:00' AND '$var2-10-30 23:59'";
			$rs10=mysqli_query($conexion,$query10);
			$octfin=0;
			while ($reg=mysqli_fetch_array($rs10)){
				$octfin ++;
				
			}
						$query11="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-11-00 00:00' AND '$var2-11-30 23:59'";
			$rs11=mysqli_query($conexion,$query11);
			$novfin=0;
			while ($reg=mysqli_fetch_array($rs11)){
				$novfin ++;
				
			}
						$query12="SELECT estado FROM orden WHERE estado='$var' AND ingreso BETWEEN '$var2-12-00 00:00' AND '$var2-12-30 23:59'";
			$rs12=mysqli_query($conexion,$query12);
			$dicfin=0;
			while ($reg=mysqli_fetch_array($rs12)){
				$dicfin ++;
				
			}?>
			<?php echo $enefin?>,<?php echo $febfin?>,<?php echo $marfin?>,<?php echo $abrfin?>,<?php echo $mayfin?>,<?php echo $junfin?>,<?php echo $julfin?>,<?php echo $agofin?>,<?php echo $sepfin?>,<?php echo $octfin?>,<?php echo $novfin?>,<?php echo $dicfin?>]
        }]
    });
});
		</script>
        <script>
		$(document).ready(function(){
   $(document).ready(function(){
    var num = 3;
    $("div#opt select.select option").each(function(){
        if($(this).val()==1){ // EDITED THIS LINE
            $(this).attr("selected","selected");    
   $("#gra-2015-act").css("display", "block");
}else{
   $("#gra-2015-act").css("display", "none");
}
  });
});
		</script>
	</head>
	<body>
      <div class="container">
     <table  class="table table-bordered table-striped" >
        <tr >

               <th width="90%"  >
     <center><h2>OPCIONES PARA GENERAR REPORTE</center></h2>
         </th>
                  </tr>
      </table>
      
      <table  class="table table-bordered table-striped" >
                  <tr>
               		<th width="90%"  >
                    
                        <center>
                      	<form action="reporte1.php" method="POST" class="form-search">
                        <div class="col-md-3">
    								<select class="select" name="estado">
        								<option value="ACTIVO">ORDENES ACTIVAS</option>
        								<option value="SUSPENDIDO">ORDENES SUSPENDIDAS</option>
        								<option value="FINALIZADO">ORDENES FINALIZADAS</option>
    								</select>
                        </div>
                        <div class="col-md-3">
    								<select class="select" name="ano">
        								<option value="2015">ORDENES DEL A&Ntilde;O 2015</option>
        								<option value="2014">ORDENES DEL A&Ntilde;O 2014</option>
    								</select>                        
                        </div>
                        <div class="col-md-3">
                         <button type="submit" name="btn1"  value="Buscar" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                        </div>
                    	</form>
                        <button type="button" class="btn btn-default" onClick="location.href='../../intranet/orden/listado_orden.php'" ><span  class="glyphicon glyphicon-th-list"></span>LISTAR</button>
                        </center>
                    </th>
                  </tr>
                </table>               
<script src="../../Highcharts-4.1.4/js/highcharts.js"></script>
<script src="../../Highcharts-4.1.4/js/modules/exporting.js"></script>

   <div id="gra-2015-act" class="col-xs-12">
<div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</div>
		</div>
	</body>
</html>
