<?php 
	require_once("dompdf/dompdf_config.inc.php");
	include ("../conexion/php_conexion.php");

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
</head>

<body>
<h1 ><center>REPORTE DE VENTAS POR FECHA</center></h1>
<div align="center">
    <table width="100%" border="1">
      <tr>
        <td bgcolor="#56ECD6"><strong>Numero Venta</strong></td>
        <td bgcolor="#56ECD6"><strong>Cliente</strong></td>
        <td bgcolor="#56ECD6"><strong>Fecha</strong></td>
     
      </tr>';

        $consulta=mysql_query("SELECT * FROM venta");
        while($dato=mysql_fetch_array($consulta)){
$codigoHTML.='
      <tr>
        <td>'.$dato['idventa'].'</td>
        <td>'.$dato['cliente'].'</td>
        <td>'.$dato['fecha'].'</td>
    
     
      </tr>';
      } 
$codigoHTML.='
    </table>
</div>
</body>
</html>';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Listadodeventas.pdf");
?>