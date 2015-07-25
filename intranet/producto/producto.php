<?php
require('../../css/cabecera.php');
require("../../conexion/php_conexion.php");
?>
<html>
<head>
<title>Sistema GTM</title>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<link type="text/css" rel="stylesheet" href="../../css/css/bootstrap.css"/>
     <link href="../../css/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../css/estilos.css" rel="stylesheet">
</head>
<body id="notas" align="center">
<?php
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";

if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	if($btn=="Buscar"){
		
		$sql="select * from producto where id='$bus'";
		$cs=mysqli_query($conexion,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
		    $var4=$resul[4];
			$var5=$resul[5];
			}
			
			
		}
	if($btn=="Nuevo"){
		
					$sql="SELECT max(id +1) from producto";
					$cs = mysqli_query($conexion,$sql);
                      if ($row = mysqli_fetch_row($cs)) {
                              $var = trim($row[0]);
                                        }
			
		}
		if($btn=="Agregar"){
			$cod=$_POST["txtcod"];
			$des=$_POST["txtdes"];
			$stk=$_POST["txtstk"];
			$pre=$_POST["txtpre"];
			$date=$_POST["txtdate"];
			$cat=$_POST["cbocat"];
	
	
		$sql="insert into producto values ('$cod','$des','$stk','$pre','$date','$cat')";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se inserto; correctamente');</script>";
		}
		if($btn=="Actualizar"){
			$cod=$_POST["txtcod"];
			$des=$_POST["txtdes"];
			$stk=$_POST["txtstk"];
			$pre=$_POST["txtpre"];
			$date=$_POST["txtdate"];
			$cat=$_POST["cbocat"];


	
		
		$sql="update producto set descripcion='$des',stock='$stk',precio='$pre',fecha='$date',categoria='$cat' where id ='$cod'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se actualizo correctamente');</script>";
		}
		
		if($btn=="Eliminar"){
		$cod=$_POST["txtcod"];
			
		$sql="delete from producto where id ='$cod'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se elimnino correctamente');</script>";
		}
	}

?>
<form action="producto.php" method="POST">
<body>
  <div class="container">
	<div class="page-header">
	
     <table  class="table table-bordered table-striped" >
        <tr >

               <th width="90%"  >
     <center><h2>MANTENIMIENTO PRODUCTO</center></h2>
         </th>
                  </tr>
      </table>

    </div>
<table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                    
                        <center>
                      	<form action="producto.php" method="POST" class="form-search">
                        		<input type="text" name="txtbus"  SIZE="40"  autocomplete="off"  placeholder="Buscar por  codigo">
                         <button type="submit" name="btn1"  value="Buscar" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                    	</form>
                        </center>
                    </th>
                  </tr>
                </table>
				
 

 <div class="col-md-6 form-group">
    <label  >CODIGO:</label>
    <input type="text" class="form-control" name="txtcod" id="txtcod" maxlength='50'  SIZE="50" value="<?php echo $var?>">
 </div>

<div class="col-md-6 form-group">
    <label  >DESCRIPCION:</label>
    <input type="text" class="form-control" name="txtdes" id="txtdes" maxlength='50'  SIZE="50"value="<?php echo $var1?>" placeholder="ingrese aqui la descripcion" onKeyUp="this.value=this.value.toUpperCase();">
 </div>
 
<div class="col-md-6 form-group">
<label >STOCK:</label>
<input type="text" class="form-control" name="txtstk" id="txtstk" value="<?php echo $var2?>" maxlength="9" placeholder="ingrese aqui el stock" >
</div>



<div class="col-md-6 form-group">
<label >PRECIO:</label>
<input type="text" class="form-control" name="txtpre"  id="txtpre"  value="<?php echo $var3?>" onKeyPress="keynumeros();" placeholder="ingrese aqui el precio">
 </div>

 <div class="col-md-6 form-group">
<label >FECHA DE VENCIMIENTO:</label>
<input type="date" class="form-control" name="txtdate"  id="txtdate"  value="<?php echo $var4?>" >
 </div>

 <div class="col-md-6 form-group">
<label >CATEGORIA:</label>
 
<?php 

$sql="SELECT * FROM categoria";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
echo "<select class='form-control' name='cbocat'>";
while ($fila=mysqli_fetch_array($res)){
echo "<option value='$fila[id]'>", $fila['nombrecat'], "</option>";
}
echo "</select>";
}
?>



 </div>


<div class="col-md-12 form-group">
 <button type="submit" name="btn1" value="Nuevo" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> NUEVO</button>
 <button type="submit" name="btn1" value="Eliminar" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> ELIMINAR</button>
 <button type="submit" name="btn1" value="Actualizar" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> ACTUALIZAR</button>
 <button type="submit" name="btn1" value="Agregar" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> GUARDAR</button>


</div>

  </div>
</table>

</form>
</body>
</html>
