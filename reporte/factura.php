<?php 
require_once("dompdf/dompdf_config.inc.php");
include ("../conexion/php_conexion.php");

$codigoHTML='
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Factura</title>
<link rel="stylesheet" type="text/css" href="../css/css/factura.css" />
</head>
<body>

	<div id="page-wrap">

		<textarea id="header">NO VALIDO COMO FACTURA</textarea>
		
		<div id="identity">
			
            <textarea id="address">Link State<br></br>
			(8324) Cipolletti <br></br>
			Telefono: (0299) 156043965 </textarea>
			
			
            <img id="logo" src="../imagenes/logols.png" alt="logo" />
 			
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">';
//	$usu=$_SESSION["usuario"];
//$codigoHTML.='
//
//            <textarea id="customer-title">Corralon naciones unidas.
//c/o '.$usu.'</textarea>
    $codigoHTML.='

            <table id="meta">
                <tr>
                    <td class="meta-head">Presupuesto #</td>';
	
				
	$consulta=mysqli_query($conexion,"SELECT max(id) as num FROM venta");
        while($dato=mysqli_fetch_array($consulta)){	
		$idventa=$dato['num'];		
    $codigoHTML.='
                <td><textarea>'.$dato['num'].'</textarea></td>
                </tr>';
		}
	$consulta=mysqli_query($conexion,"SELECT descuento FROM venta WHERE id ='$idventa'");
        while($dato=mysqli_fetch_array($consulta)){
		if ($dato['descuento']=='SIN DESCUENTO'){
			$des=1;
		}
		else{
		$des=$dato['descuento'];
		}
		}
    $codigoHTML.='
                <tr>

                    <td class="meta-head">Fecha</td>';
	$consulta=mysqli_query($conexion,"SELECT max(fecha) as fecha FROM venta");
        while($dato=mysqli_fetch_array($consulta)){
			
			    $codigoHTML.='

                    <td><textarea id="date">'.$dato['fecha'].'</textarea></td>
                </tr>';
		}
		    $codigoHTML.='
                <tr>
                    <td class="meta-head">Cliente</td>';
	$consulta=mysqli_query($conexion,"SELECT cliente  as cli FROM venta ORDER BY id DESC LIMIT 1");
        while($dato=mysqli_fetch_array($consulta)){
			$idcli=$dato['cli'];
			$sql=mysqli_query($conexion,"SELECT nombre FROM cliente WHERE dni='$idcli'");
			        while($dato2=mysqli_fetch_array($sql)){

$codigoHTML.='
                    <td><div class="due">'.$dato2['nombre'].'</div></td>
                </tr>';
		}
		}
$codigoHTML.='


            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Codigo</th>
		      <th>Descripcion</th>
		      <th>Precio unitario</th>
		      <th>Cantidad</th>
		      <th>Precio</th>
		  </tr>';
		  
	$consulta=mysqli_query($conexion,"SELECT * FROM detalleventa WHERE venta_id='$idventa'");
        while($dato=mysqli_fetch_array($consulta)){
$codigoHTML.='	  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>'.$dato['codpro'].'</textarea></div></td>
		      <td class="description"><textarea>'.$dato['producto'].'</textarea></td>
		      <td><textarea class="cost">$'.$dato['precio'].'</textarea></td>
		      <td><textarea class="qty">'.$dato['cantidad'].'</textarea></td>
		      <td><span class="price">$'.$dato['importe'].'</span></td>
		  </tr>';
		}
$codigoHTML.='	  

		</table>
		
		<table id="rs">
        <tr>
			<td colspan="2" class="rs-head">Subtotal</td>';
	$consulta=mysqli_query($conexion,"SELECT ROUND(SUM(importe),2) as subtotal FROM detalleventa");
        while($dato=mysqli_fetch_array($consulta)){
$codigoHTML.='
			<td class="total-value"><div id="subtotal">$'.$dato['subtotal'].'</div></td>
		  </tr>';
		}
$codigoHTML.='
		 <tr>
			<td colspan="2" class="rs-head">IVA 21%</td>';
	$consulta=mysqli_query($conexion,"SELECT ROUND(SUM(importe)*21/100 ,2) as igv FROM detalleventa");
        while($dato=mysqli_fetch_array($consulta)){
$codigoHTML.='
		    <td class="total-value"><div id="total">$'.$dato['igv'].'</div></td>
		  </tr>';
		}
$codigoHTML.='		
		  <tr>
			<td colspan="2" class="rs-head">Descuento</td>';
	if($des!=1){
	$consulta=mysqli_query($conexion,"SELECT ROUND(SUM(importe)*$des/100 ,2) as igv FROM detalleventa");
        while($dato=mysqli_fetch_array($consulta)){
			$tdes=$dato['igv'];
		}
	}
	else {
		$tdes=0.00;
	}
$codigoHTML.='
		    <td class="total-value"><textarea id="paid">$'.$tdes.'</textarea></td>
		  </tr>';
$codigoHTML.='		  
		  <tr>
			<td colspan="2" class="rs-head">Total</td>';
	$consulta=mysqli_query($conexion,"SELECT ROUND(SUM(importe)*21/100+SUM(importe)-SUM(importe)*$des/100,2) as total FROM detalleventa");
        while($dato=mysqli_fetch_array($consulta)){
$codigoHTML.='
		    <td class="total-value balance"><div class="due">$'.$dato['total'].'</div></td>
		  </tr>';
		}
$codigoHTML.='		
          </table>

	
	</div>
	<div id="terms">
		  <h5>Terminos</h5>
		  <textarea>Valido por 7 Dias.</textarea>
		</div>
	
</body>

</html>';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","256M");
$dompdf->render();
$dompdf->stream('factura.pdf',array('Attachment'=>0));
//$dompdf->stream("factura.pdf");
?>