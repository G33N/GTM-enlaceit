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
<body  align="center">
<?php
$var="";
$var1="";


if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	if($btn=="Buscar"){
		
		$sql="select * from categoria where id='$bus'";
		$cs=mysqli_query($conexion,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];

			}
			
			
		}
	if($btn=="Nuevo"){
		
					$sql="SELECT max(id +1) from categoria";
					$cs = mysqli_query($conexion,$sql);
                      if ($row = mysqli_fetch_row($cs)) {
                              $var = trim($row[0]);
                                        }
			
		}
		if($btn=="Agregar"){
		$cod=$_POST["txtcod"];
		$nom=$_POST["txtnom"];

	
	
		$sql="insert into categoria values ('$cod','$nom')";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se inserto; correctamente');</script>";
		}
		if($btn=="Actualizar"){
		$cod=$_POST["txtcod"];
		$nom=$_POST["txtnom"];

		
		$sql="update categoria set nombrecat='$nom' where id ='$cod'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se actualizo correctamente');</script>";
		}
		
		if($btn=="Eliminar"){
		$cod=$_POST["txtcod"];
			
		$sql="delete from categoria where id ='$cod'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se elimnino correctamente');</script>";
		}
	}

?>
<form action="" method="POST">
<body>
  <div class="container">
	<div class="page-header">
	
     <table  class="table table-bordered table-striped" >
        <tr >

               <th width="90%"  >
     <center><h2>MANTENIMIENTO CATEGORIA</center></h2>
         </th>
                  </tr>
      </table>

    </div>
<table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                    
                        <center>
                      	<form action="" method="POST" class="form-search">
                        		<input type="text" name="txtbus"  SIZE="40"  autocomplete="off"  placeholder="Buscar por  codigo">
                         <button type="submit" name="btn1"  value="Buscar" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                    	</form>
                        </center>
                    </th>
                  </tr>
                </table>
				
 

 <div class="col-md-6 form-group">
    <label  >CODIGO:</label>
    <input type="text" class="form-control" name="txtcod" id="txtcod" maxlength='50'  SIZE="50"value="<?php echo $var?>">
 </div>

<div class="col-md-6 form-group">
    <label  >DESCRIPCION:</label>
    <input type="text" class="form-control" name="txtnom" id="txtnom" maxlength='50'  SIZE="50"value="<?php echo $var1?>" placeholder="ingrese aqui la descripcion" onKeyUp="this.value=this.value.toUpperCase();">
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
