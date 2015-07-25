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


if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	if($btn=="Buscar"){
		
		$sql="select * from usuario where id='$bus'";
		$cs=mysqli_query($conexion,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$var=$resul[0];
			$var1=$resul[1];
			$var2=$resul[2];
			$var3=$resul[3];
		$var4=$resul[4];
		
			}
			
			
		}
	if($btn=="Nuevo"){
		
					$sql="SELECT max(id +1) from usuario";
					$cs = mysqli_query($conexion,$sql);
                      if ($row = mysqli_fetch_row($cs)) {
                              $var = trim($row[0]);
                                        }
			
		}
		if($btn=="Agregar"){
		$cod=$_POST["txtid"];
		$usu=$_POST["txtusu"];
		$pas=$_POST["txtpas"];
		$car=$_POST["txtcar"];
		$nom=$_POST["txtnom"];
			
	
	
		$sql="insert into usuario values ('$cod','$usu','$pas','$car','$nom')";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se inserto; correctamente');</script>";
		}
		if($btn=="Actualizar"){
		$cod=$_POST["txtid"];
		$usu=$_POST["txtusu"];
		$pas=$_POST["txtpas"];
		$car=$_POST["txtcar"];
		$nom=$_POST["txtnom"];
		

		
		$sql="update usuario set usuario='$usu',clave='$pas',cargo_usu='$car' ,nombres='$nom'  where id ='$cod'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se actualizo correctamente');</script>";
		}
		
		if($btn=="Eliminar"){
		$cod=$_POST["txtid"];
			
		$sql="delete from productos where id ='$cod'";
		
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
     <center><h2>MANTENIMIENTO USUARIO</center></h2>
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
    <input type="text" class="form-control" name="txtid" id="txtid" maxlength='50'  SIZE="50"value="<?php echo $var?>">
 </div>

<div class="col-md-6 form-group">
    <label  >USUARIO:</label>
    <input type="text" class="form-control" name="txtusu" id="txtusu" maxlength='50'  SIZE="50"value="<?php echo $var1?>" placeholder="ingrese aqui el usuario" >
 </div>
 
<div class="col-md-6 form-group">
<label >CLAVE:</label>
<input type="text" class="form-control" name="txtpas" id="txtpas" value="<?php echo $var2?>" maxlength="9" placeholder="ingrese aqui la clave" >
</div>



<div class="col-md-6 form-group">
<label >CARGO:</label>
<input type="text" class="form-control" name="txtcar"  id="txtcar"  value="<?php echo $var3?>"  placeholder="ingrese aqui el cargo">
 </div>

 <div class="col-md-6 form-group">
<label >NOMBRES:</label>
<input type="text" class="form-control" name="txtnom"  id="txtnom"  value="<?php echo $var4?>"  placeholder="ingrese aqui sus nombres">
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
