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
$varb=@$_GET['dni'];
$var="";
$var0="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";


if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	if($btn=="Buscar"){
		
		$sql="select * from cliente where dni='$bus'";
		$cs=mysqli_query($conexion,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$var=$resul[0];
			$var0=$resul[1];
			$var1=$resul[2];
			$var2=$resul[3];
			$var3=$resul[4];
			$var4=$resul[5];
			$var5=$resul[6];
			}
			
			
		}
	if($btn=="Nuevo"){
		
					$sql="SELECT max(id +1) from cliente";
					$cs = mysqli_query($conexion,$sql);
                      if ($row = mysqli_fetch_row($cs)) {
                              $var = trim($row[0]);
                                        }
			
		}
		if($btn=="Agregar"){
			if(isset($_POST['txtnom']) && !empty($_POST['txtnom']) &&
				isset($_POST['txtdni']) && !empty($_POST['txtdni']) &&
				isset($_POST['txtdir']) && !empty($_POST['txtdir']) &&
				isset($_POST['txtloc']) && !empty($_POST['txtloc']) &&
				isset($_POST['txttel']) && !empty($_POST['txttel']) &&
				isset($_POST['txtmai']) && !empty($_POST['txtmai'])){
		$id=$_POST["txtid"];
		$nom=$_POST["txtnom"];
		$dni=$_POST["txtdni"];
		$dir=$_POST["txtdir"];
		$loc=$_POST["txtloc"];
		$tel=$_POST["txttel"];
		$mail=$_POST["txtmai"];
		$sql="insert into cliente values ('$id','$nom','$dni','$dir','$loc','$tel','$mail')";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se inserto; correctamente');</script>";

		}
		else{
		echo "<script> alert('Error al insertar datos');</script>";
		}
		}
		if($btn=="Actualizar"){
			if(isset($_POST['txtnom']) && !empty($_POST['txtnom']) &&
				isset($_POST['txtdni']) && !empty($_POST['txtdni'])){
		$id=$_POST["txtid"];
		$nom=$_POST["txtnom"];
		$dni=$_POST["txtdni"];
		$dir=$_POST["txtdir"];
		$loc=$_POST["txtloc"];
		$tel=$_POST["txttel"];
		$mail=$_POST["txtmai"];

		
		$sql="UPDATE cliente SET nombre='$nom',dni='$dni',direccion='$dir',localidad='$loc',telefono='$tel',mail='$mail' WHERE id='$id'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se actualizo correctamente');</script>";
	 
				}
				else{
				echo "<script> alert('Error al actualizar datos');</script>";
				}
				
		}
		
		if($btn=="Eliminar"){
		$cod=$_POST["txtcod"];
			
		$sql="delete from cliente where id ='$cod'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se elimnino correctamente');</script>";

		}
		
	}

?>
<form action="cliente.php" method="POST" id="cliform">
<body>
  <div class="container">
	<div class="page-header">
	
     <table  class="table table-bordered table-striped" >
        <tr >

               <th width="90%"  >
     <center><h2>DATOS PERSONALES DEL CLIENTE</center></h2>
         </th>
                  </tr>
      </table>

    </div>
<table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                    
                        <center>
                      	<form action="cliente.php" method="POST" class="form-search">
                        		<input type="text" name="txtbus"  SIZE="40"  autocomplete="off"  value="<?php echo $varb?>" placeholder="Buscar por DNI / CUIL" onKeyUp="this.value=this.value.toUpperCase();">
                         <button type="submit" name="btn1"  value="Buscar" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                    	</form>
                                                <button type="button" class="btn btn-default" onClick="location.href='../../intranet/cliente/listado_cliente.php'" ><span  class="glyphicon glyphicon-th-list"></span>LISTAR</button>

                        </center>
                    </th>
                  </tr>
                </table>
				
 

 <div class="col-md-6 form-group">
    <label  >NOMBRES Y APELLIDOS:</label>
    <input type="text" class="form-control" name="txtnom" id="txtnom" maxlength='50'  SIZE="50" value="<?php echo $var1?>" placeholder="ingrese aqui sus nombres" onKeyUp="this.value=this.value.toUpperCase();" >
 </div>

<div class="col-md-6 form-group">
    <label  >DNI:</label>
    <input type="text" class="form-control" name="txtdni" id="txtdni" maxlength='50'  SIZE="50" value="<?php echo $var0?>" onKeyPress="keynumeros();" placeholder="ingrese aqui DNI / CUIL" >
 </div>
 
<div class="col-md-6 form-group">
<label >DIRECCION:</label>
<input type="text" class="form-control" name="txtdir" id="txtdir" value="<?php echo $var2?>" placeholder="ingrese aqui su direccion" onKeyUp="this.value=this.value.toUpperCase();" >
</div>



<div class="col-md-6 form-group">
<label >LOCALIDAD:</label>
<input type="text" class="form-control" name="txtloc"  id="txtloc"  value="<?php echo $var3?>" placeholder="ingrese aqui su localidad" onKeyUp="this.value=this.value.toUpperCase();" >
 </div>


<div class="col-md-6 form-group">
<label >TELEFONO:</label>
 <input type="text"  class="form-control" name="txttel" id="txttel" value="<?php echo $var4?>" onKeyPress="keynumeros();" placeholder="ingrese aqui su telefono" >
  </div>
  <div class="col-md-6 form-group">
<label >MAIL:</label>
 <input type="mail"  class="form-control" name="txtmai" id="txtmai" value="<?php echo $var5?>" placeholder="ingrese aqui su mail" >
  </div>
   <div class="col-md-6 form-group">
    <input type="hidden" class="form-control" name="txtid" id="txtid" maxlength='50'  SIZE="50" value="<?php echo $var?>" >
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
