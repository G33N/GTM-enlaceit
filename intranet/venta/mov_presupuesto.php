<?php
session_start();
require('../../css/cabecera.php');
include_once('../../conexion/php_conexion.php');
?>
<!DOCTYPE html>
<html lang="es"> 
<head>
<title>Sistema GTM</title>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<link type="text/css" rel="stylesheet" href="../../css/css/bootstrap.css"/>
     <link href="../../css/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../css/estilos.css" rel="stylesheet">
</head>
<body> 
<?php
		
$var=@$_GET['var'];
$var1="";
$var2="";
$var3="";
$var4="";
$var0="";
$des="";

if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
     $bus=$_POST["codpro"];
	
	include_once('php_conexion2.php');
	$des=@$_POST['descuento'];
		if($btn=="Nuevo"){

			
			 mysqli_query($conexion,"truncate table temporal_presupuesto"); 
		}
		
			if($btn=="Buscar"){
		
		$sql="select * from producto where id='$bus'";
		$cs=mysqli_query($conexion,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
			$var4=$resul[4];

			}		
		}
	
	if($btn=="agrega"){
  include_once('php_conexion2.php');
	$venta=$_POST['venta'];
	$producto=$_POST['producto'];
	$cantidad=$_POST['cantidad']; 
	$codpro=$_POST['codpro'];
	$precio=$_POST['precio'];
	$importe=$cantidad*$precio;
	
	mysqli_query($conexion,"insert into temporal_presupuesto (id,codpro,producto,cantidad,precio,importe) values ('','$codpro','$producto','$cantidad','$precio','$importe')");		   
		   
	
   }
   
   if($btn=="guarda"){
include_once('php_conexion2.php');
	
	$venta=$_POST['venta'];
	$cliente=$_POST['cliente'];
	$fecha=$_POST['fecha'];
	$des=@$_POST['descuento'];				

	if(isset($_POST['txtusu']) && !empty($_POST['txtusu'])){
		$usu=$_POST['txtusu'];
	   		$sql="SELECT * FROM usuario where usuario='$usu'";
			$res=mysqli_query($conexion,$sql);
			while ($fila2=mysqli_fetch_array($res)){
			$idusu=$fila2['id'];
			}
	}
			else{ echo "<script> alert('Error al realizar presupuesto');</script>"; }
			
   mysqli_query($conexion,"insert into presupuesto (id,usuario,cliente,fecha,descuento) values ('$venta','$idusu','$cliente','$fecha','$des')");
   
   		$res=mysqli_query($conexion,"SELECT * FROM temporal_presupuesto");
					while ($fila=mysqli_fetch_array($res)){
						$producto=$fila['producto'];
						$cantidad=$fila['cantidad']; 
						$codpro=$fila['codpro'];
						$precio=$fila['precio'];
						$importe=$cantidad*$precio;
   
   	mysqli_query($conexion,"INSERT INTO detalle_presupuesto (id,codpro,producto,cantidad,precio,importe,venta_id) values ('','$codpro','$producto','$cantidad','$precio','$importe','$venta')");

					}

   echo "<script> alert('Presupuesto guardado con Exito');</script>";	
   }


}
?>
<FORM  action="mov_presupuesto.php" method="post" enctype="multipart/form-data" >
<div class="container">
<div style="width:112%; height:auto; overflow:auto">

<table class="table table-bordered">

<TR width="50%">
   <TD class="info">EMPLEADO:</TD> 
   	<td ><b><input type="text" name="txtusu" readonly value="<?php 
$usu=$_SESSION["usuario"];
echo $usu;?>"/>
</td>
   <TD class="info">VENTA:</TD> 

   <TD><b><INPUT TYPE="text" NAME="venta" SIZE="20" MAXLENGTH="30" value="<?php 
   $pa=mysqli_query($conexion,"SELECT MAX(id)as maximo FROM presupuesto");				
        if($row=mysqli_fetch_array($pa)){
			if($row['maximo']==NULL){
				$factura='1001';
			}else{
				$factura=$row['maximo']+1;
			}
		}
   echo   $factura; ?>" > 

   
   		
   </TD>

   </TR>
   <TR>
   <TD class="info">CLIENTE:</TD> 

<td><b><?php 
$sql="SELECT * FROM cliente";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
echo "<select  name='cliente' >";
while ($fila=mysqli_fetch_array($res)){
echo "<option value='$fila[id]'>$fila[nombre]</option>";
}
echo "</select>";
}
?></td>

  <TD class="info">FECHA:</TD> 
   <TD><b><INPUT TYPE="text" NAME="fecha" value="<?php echo (date('Y-m-d')); ?>"></TD>     

   <TD class="info">DESCUENTO:</TD> 

<td><b>
<input type="text" name="descuento" id="descuento" value="<?php echo $des ?>">
</td>
</TR>
<TR>
  <TD class="info">CODIGO:</TD> 
   <TD><INPUT TYPE="text" NAME="codpro" SIZE="20" MAXLENGTH="30" value="<?php echo $var?>"></TD> 
   <TD>
   <button type="submit" NAME="btn1" VALUE="Buscar" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>ACTUALIZAR</button></TD> 
    <TD>

<button type="button" class="btn btn-default" onClick="location.href='../../intranet/producto/listado_producto2.php'" ><span  class="glyphicon glyphicon-th-list"></span>LISTAR</button>
	   </TD>  
   <TD class="info">PRODUCTO:</TD> 
   <TD><INPUT TYPE="text" NAME="producto" SIZE="40" MAXLENGTH="70" value="<?php echo $var1?>"/></TD>
   </TR> 
   <TR><TD class="info">CANTIDAD:</TD> 
   <TD><INPUT TYPE="text" NAME="cantidad" SIZE="20" MAXLENGTH="30" ></TD>
   <TD class="info">PRECIO:</TD> 
   <TD><INPUT TYPE="text" NAME="precio" SIZE="20" MAXLENGTH="30" value="<?php echo $var3?>"></TD> 
   <TD class="info">STOCK:</TD> 
   <TD><INPUT TYPE="text" NAME="stock" SIZE="20" MAXLENGTH="30" value="<?php echo $var2?>"><INPUT TYPE="hidden" NAME="txtcat" SIZE="20" MAXLENGTH="30" value="<?php echo $var4?>"></TD>    
</TR>
 
</TABLE> 

<center>
 <button type="submit" name="btn1" value="Nuevo" class="btn btn-default"><span class="glyphicon glyphicon-file"></span>NUEVO</button>
 
  <button type="submit" name="btn1" value="guarda" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span>GUARDAR</button>
  <button type="button" class="btn btn-warning" onClick="location.href='../../reporte/factura.php'" ><span class="glyphicon glyphicon-save"></span>IMPRIMIR</button>
  <button type="submit" name="btn1" value="agrega" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>AGREGAR</button>
 </center>
  </div>
</div>
</FORM> 
<?php 
  require('php_conexion2.php');
   $result=mysqli_query($conexion,"select * from temporal_presupuesto"); 
?> 
<div class="container">
<div style="width:80%; height:auto; overflow:auto">
  <table class="table table-bordered table-striped" width="50%">
      <TR class="active"><TD>&nbsp;<B>codpro</B></TD><TD>&nbsp;<B>Descripcion</B></TD> <TD>&nbsp;<B>Cantidad</B>&nbsp;</TD>
	 <TD>&nbsp;<B>Precio</B>&nbsp;</TD><TD>&nbsp;<B>Importe</B>&nbsp;</TD> <TD>&nbsp;</TD></TR> 
<?php       
   while($row = mysqli_fetch_array($result)) { 
      printf("<tr>
	  <td>&nbsp;%s</td>
	  <td>&nbsp;%s</td>
	  <td>&nbsp;%s&nbsp;</td>
	   <td>&nbsp;%s&nbsp;</td>
	   <td>&nbsp;%s&nbsp;</td>
	    
	  <td ><a href='borra.php?id=%d' class='btn btn-danger'><span class='glyphicon glyphicon-minus'></span>Borrar</a></td>
	  </tr>", 
	 $cod=$row["codpro"],$pro=$row["producto"],$cant=$row["cantidad"],$pre=$row["precio"],$imp=$row["importe"],$row["id"]); 
     
				
   }    
   mysqli_free_result($result); 
   //mysql_close($conexion);    
?>
</table >
</div  >
</div>
 <div class="span6" align="right">
<div style="width:27%;  height:200px;" >
<table class="table table-bordered">
<tr>
<td class="info" ><B>SUBTOTAL </td>
<td ><B><input type='text' name='cboaula' id='cboaula' value='<?php 

include_once('php_conexion2.php');
$sql="SELECT ROUND(SUM(importe),2) as subtotal FROM temporal_presupuesto";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
while ($fila=mysqli_fetch_array($res)){
echo  $fila['subtotal'];
}
}
?>'>
</td>
</tr>
<tr>
<td class="info"><B>IVA 21%    </td>
<td><B><input type='text' name='cboaula' id='cboaula' value='<?php 
include_once('php_conexion2.php');
$sql="SELECT ROUND(SUM(importe)*21/100 ,2) as igv FROM temporal_presupuesto";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
while ($fila=mysqli_fetch_array($res)){
echo  $fila['igv'];
}
}
?>'>
</td>
</tr>

<tr>
<?php $des=@$_POST['descuento']; ?>
<td class="info"><B>DESCUENTO <?php if($des==''){ echo "-";} else{ echo $des; } ?>%    </td>
<td><B><input type='text' name='cboaula' id='cboaula' value='<?php 
include_once('php_conexion2.php');
$sql="SELECT ROUND(SUM(importe)*$des/100 ,2) as igv FROM temporal_presupuesto";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " SIN DESCUENTO";
}
else{
while ($fila=mysqli_fetch_array($res)){
echo  $fila['igv'];
}
}
?>'>
</td>
</tr>

<tr>
<td class="info"><B>TOTAL   </td>
<td ><B><input type='text' name='cboaula' id='cboaula' value='<?php 

include_once('php_conexion2.php');
if($des=='SIN DESCUENTO'){$des=0;}
$sql="SELECT ROUND(SUM(importe)*21/100+SUM(importe)-SUM(importe)*$des/100,2) as total FROM temporal_presupuesto";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
while ($fila=mysqli_fetch_array($res)){
echo  $fila['total'];
}
}
?>'>
</td>
</tr>
</table>
</div> 
</div> 
</div>
</body> 
</html> 