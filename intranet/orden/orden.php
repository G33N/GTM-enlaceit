<?php
require('../../css/cabecera.php');
require("../../conexion/php_conexion.php");
?>
<html>
<head>
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
$varb = @$_GET['pat'];
$varb1 = @$_GET['ing'];
$var = "";
$var1 = "";
$var2 = "";
$var3 = "";
$var4 = "";
$var5 = "";
$var6 = "";
$var7 = "";
$var8 = "";
$var9 = "";
$var10 = date("Y-m-d");
$var11 = "";
$var12 = "";
$var13 = "";
$var14 = "";
$p1="";
$p2="";

if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
	$bus=$_POST["txtbus"];
	$bus1=$_POST["txtbus1"];
	if($btn=="Buscar"){
		
		$sql="select * from orden where patente='$bus' AND ingreso='$bus1'";
		$cs=mysqli_query($conexion,$sql);
		while($resul=mysqli_fetch_array($cs)){
			$var = $resul[0];
			$var1 = $resul[1];
			$var2 = $resul[2];
			$var3 = $resul[3];
		    $var4 = $resul[4];
			$var5 = $resul[5];
			$var6 = $resul[6];
			$var7 = $resul[7];
			$var8 = $resul[8];
			$var9 = $resul[9];
			$var10 = $resul[10];
			$var11 = $resul[11];
			$var12 = $resul[12];
			$var13 = $resul[13];
			$var14 = $resul[14];
			}
			
					}
		
	if($btn=="Nuevo"){
		
					$sql="SELECT max(id +1) from orden";
					$cs = mysqli_query($conexion,$sql);
                      if ($row = mysqli_fetch_row($cs)) {
                              $var = trim($row[0]);
                                        }
			
		}
		if($btn=="Agregar"){
			if(isset($_POST['txtmod']) && !empty($_POST['txtmod']) &&
				isset($_POST['txtpat']) && !empty($_POST['txtpat']) &&
				isset($_POST['chccom']) && !empty($_POST['chccom']) &&
				isset($_POST['slccli']) && !empty($_POST['slccli']) &&
				isset($_POST['txtvin']) && !empty($_POST['txtvin']) &&
				isset($_POST['chcaux']) && !empty($_POST['chcaux']) &&
				isset($_POST['chcest']) && !empty($_POST['chcest']) &&
				isset($_POST['txttra']) && !empty($_POST['txttra']) &&
				isset($_POST['txting']) && !empty($_POST['txting']) &&
				isset($_POST['cbousu']) && !empty($_POST['cbousu'])){
					
			$limit = 6;
			$p = $_POST['txtpat'];
			$rp1 = preg_replace('/[a-zA-Z]/','',$p);
			$rp2 = preg_replace('/[0-9]/','',$p);
			$crp1 = strlen($rp1);
			$crp2 = strlen($rp2);
			$rp = $crp1 + $crp2;
			if ( $rp == $limit){
					$p1=1;
				}
				else {
					echo "<script> alert('Patente incorrecta!');history.back();</script>";
					$classpat='has-error';
					}
					
		$id = $_POST["txtid"];
		$mod = $_POST["txtmod"];
		$pat = $_POST["txtpat"];
		$com = $_POST["chccom"];
		$cli = $_POST["slccli"];
		$vin = $_POST["txtvin"];
		$kil = $_POST["txtkil"];
		$aux = $_POST["chcaux"];
		$est = $_POST["chcest"];
		$tra = $_POST["txttra"];
		$des = $_POST["txtdes"];
		$ing = $_POST["txting"];
		$sal = $_POST["txtsal"];
		$usu = $_POST["cbousu"];
		$sta = $_POST["slcsta"];

		if($p1==1){
		$sql="INSERT INTO orden VALUES ('$id','$mod','$pat','$com','$cli','$vin','$kil','$aux','$est','$tra','$des','$ing','$sal','$usu','$sta')";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se inserto; correctamente');</script>";
		
		echo"<script language='javascript'>
		if(confirm('¿Desea imprimir la orden?')) 
		{ 
			window.open('../../reporte/fpdf7/ultorden.php');
			window.location = 'orden.php';		
		} 
		else 
		{ 
			window.location = 'orden.php';		 
		} 
	</script> ";
		}
		}
		else{
		echo "<script> alert('Error al insertar datos');history.back();</script>";
		}
		}
		
		if($btn=="Actualizar"){
			if(isset($_POST['txtmod']) && !empty($_POST['txtmod']) &&
				isset($_POST['txtpat']) && !empty($_POST['txtpat']) &&
				isset($_POST['chccom']) && !empty($_POST['chccom']) &&
				isset($_POST['slccli']) && !empty($_POST['slccli']) &&
				isset($_POST['txtvin']) && !empty($_POST['txtvin']) &&
				isset($_POST['chcaux']) && !empty($_POST['chcaux']) &&
				isset($_POST['chcest']) && !empty($_POST['chcest']) &&
				isset($_POST['txttra']) && !empty($_POST['txttra']) &&
				isset($_POST['txting']) && !empty($_POST['txting']) &&
				isset($_POST['cbousu']) && !empty($_POST['cbousu'])){
					
			$limit = 6;
			$p = $_POST['txtpat'];
			$rp1 = preg_replace('/[a-zA-Z]/','',$p);
			$rp2 = preg_replace('/[0-9]/','',$p);
			$crp1 = strlen($rp1);
			$crp2 = strlen($rp2);
			$rp = $crp1 + $crp2;
			if ( $rp == $limit){
					$p2=1;
				}
				else {
					echo "<script> alert('Patente incorrecta!');history.back();</script>";
					$classpat='has-error';
					}
					
		$id = $_POST["txtid"];
		$mod = $_POST["txtmod"];
		$pat = $_POST["txtpat"];
		$com = $_POST["chccom"];
		$cli = $_POST["slccli"];
		$vin = $_POST["txtvin"];
		$kil = $_POST["txtkil"];
		$aux = $_POST["chcaux"];
		$est = $_POST["chcest"];
		$tra = $_POST["txttra"];
		$des = $_POST["txtdes"];
		$ing = $_POST["txting"];
		$sal = $_POST["txtsal"];
		$usu = $_POST["cbousu"];
		$sta = $_POST["slcsta"];
	
	if($p2==1){
		$sql="update orden set modelo='$mod',patente='$pat',combustible='$com',cliente='$cli',vin='$vin',kilometro='$kil',auxilio='$aux',estereo='$est',trabajo='$tra',descripcion='$des',ingreso='$ing',salida='$sal',usuario='$usu',estado='$sta' where id='$id'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se actualizo correctamente');</script>";
		}
		}
		else{
		echo "<script> alert('Error al actualizar datos');</script>";
		}
		}
		
		if($btn=="Eliminar"){
		$id=$_POST["txtid"];
			
		$sql="delete from orden where id ='$id'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se elimnino correctamente');</script>";
		}
	}

?>
<form id="formorden" action="orden.php" method="POST">
<body>
  <div class="container">
	<div class="page-header">
	
     <table  class="table table-bordered table-striped" >
        <tr >

               <th width="90%"  >
     <center><h2>GESTION DE ORDENES</center></h2>
         </th>
                  </tr>
      </table>

    </div>
<table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                    
                        <center>
                      	<form action="orden.php" method="POST" class="form-search">
                        <div class="col-md-3">
                        		<input type="text" class="form-control" name="txtbus" value="<?php echo $varb?>" SIZE="20"  autocomplete="off"  placeholder="Patente">
                        </div>
                        <div class="col-md-3">
                                <input type="date" class="form-control" name="txtbus1" value="<?php echo $varb1?>" SIZE="20"  autocomplete="off"  placeholder="Ingreso">
                        </div>
                         <button type="submit" name="btn1"  value="Buscar" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                    	</form>
                        <button type="button" class="btn btn-default" onClick="location.href='../../intranet/orden/listado_orden.php'" ><span  class="glyphicon glyphicon-th-list"></span>LISTAR</button>
                        </center>
                    </th>
                  </tr>
                </table>
				
 

 <div class="col-md-6 form-group">
    <label  >MODELO:</label>
    <input type="text" class="form-control" name="txtmod" id="txtmod" maxlength='50'  SIZE="50" value="<?php echo $var1?>" placeholder="ingrese aqui el modelo" onKeyUp="this.value=this.value.toUpperCase();" >
 </div>
 
<div class="col-md-6 form-group <?php echo $classpat ?>">
    <label  >PATENTE:</label>
    <input type="text" class="form-control" name="txtpat" id="txtpat" maxlength='50'  SIZE="50"value="<?php echo $var2?>" placeholder="ingrese aqui la patente" onKeyUp="this.value=this.value.toUpperCase();" >
 </div>
 
<div class="col-md-6 form-group">
<label >COMBUSTIBLE:</label></br>
<label class="checkbox-inline">
  <input type="checkbox" name="chccom" id="chcaux" value="RES" <?php if($var3 == 'RES'){ echo 'checked'; }?>> RES
</label><label class="checkbox-inline">
  <input type="checkbox" name="chccom" id="chcaux" value="1/4" <?php if($var3 == '1/4'){ echo 'checked'; }?>> 1/4
</label><label class="checkbox-inline">
  <input type="checkbox" name="chccom" id="chcaux" value="1/2" <?php if($var3 == '1/2'){ echo 'checked'; }?>> 1/2
</label><label class="checkbox-inline">
  <input type="checkbox" name="chccom" id="chcaux" value="3/4" <?php if($var3 == '3/4'){ echo 'checked'; }?>> 3/4
</label><label class="checkbox-inline">
  <input type="checkbox" name="chccom" id="chcaux" value="FULL" <?php if($var3 == 'FULL'){ echo 'checked'; }?>> FULL
</label></div>
 <div class="col-md-6 form-group">
<label >CLIENTE:</label>
 
<?php 

$sql="SELECT * FROM cliente";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
echo "<select class='form-control' name='slccli' >";
?>
<option value="<?php echo $var14 ?>"><?php $sql2="SELECT * FROM cliente WHERE id='$var14'"; $res2=@mysqli_query($conexion,$sql2); while ($fila2=mysqli_fetch_array($res2)){ echo $fila2['nombre'];}
?></option>";
<?php
while ($fila=mysqli_fetch_array($res)){
echo "<option value='$fila[id]'>$fila[nombre]</option>";
}
echo "</select>";
}
?>
</div>
 <div class="col-md-6 form-group">
<label >VIN:</label>
<input type="text" class="form-control" name="txtvin"  id="txtvin"  value="<?php echo $var6?>" onKeyPress="keynumeros();" placeholder="ingrese aqui el VIN" onKeyUp="this.value=this.value.toUpperCase();" >
 </div>
 <div class="col-md-6 form-group">
<label >KILOMETROS:</label>
<input type="text" class="form-control" name="txtkil"  id="txtkil"  value="<?php echo $var7?>" onKeyPress="keynumeros();" placeholder="ingrese aqui el kilometraje" >
 </div>
  <div class="col-md-6 form-group">
<label >AUXILIO:</label></br>
<label class="checkbox-inline">
  <input type="checkbox" name="chcaux" id="chcaux" value="SI" <?php if($var4 == 'SI'){ echo 'checked'; }?>> SI
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="chcaux" id="chcaux2" value="NO" <?php if($var4 == 'NO'){ echo 'checked'; }?>> NO
</label>
 </div>
  <div class="col-md-6 form-group">
<label >ESTEREO:</label></br>
<label class="checkbox-inline">
  <input type="checkbox" name="chcest" id="chcest" value="SI" <?php if($var5 == 'SI'){ echo 'checked'; }?>> SI
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="chcest" id="chcest2" value="NO" <?php if($var5 == 'NO'){ echo 'checked'; }?>> NO
</label> </div>
<div class="col-md-6 form-group">
<label >SOLICITUD DE TRABAJO:</label>
<textarea type="text" class="form-control" name="txttra"  id="txttra"  placeholder="ingrese aqui la solicitud de trabajo" onKeyUp="this.value=this.value.toUpperCase();"><?php echo $var8?></textarea>
 </div>
 <div class="col-md-6 form-group">
<label >DESCRIPCION DE OPERACIONES:</label>
<textarea type="text" class="form-control" name="txtdes"  id="txtdes"  placeholder="ingrese aqui la descripcion de trabajo" onKeyUp="this.value=this.value.toUpperCase();"><?php echo $var9?></textarea>
 </div>
 <div class="col-md-6 form-group">
<label >FECHA DE INGRESO:</label>
<input type="date" class="form-control" name="txting"  id="txting"  value="<?php echo $var10?>" >
 </div>
  <div class="col-md-6 form-group">
<label >FECHA DE SALIDA:</label>
<input type="date" class="form-control" name="txtsal"  id="txtsal"  value="<?php echo $var11?>" >
 </div>

 <div class="col-md-6 form-group">
<label >RECIBIDO POR:</label>
 
<?php 

$sql="SELECT * FROM usuario";
$res=@mysqli_query($conexion,$sql);
if(!$res){
echo " fallo";
}
else{
echo "<select class='form-control' name='cbousu'>";
?>
<option value="<?php echo $var13 ?>"><?php $sql2="SELECT * FROM usuario WHERE id='$var13'"; $res2=@mysqli_query($conexion,$sql2); while ($fila2=mysqli_fetch_array($res2)){ echo $fila2['nombre'];}
?></option>";
<?php
while ($fila=mysqli_fetch_array($res)){
echo "<option value='$fila[id]'>", $fila['usuario'], "</option>";
}
echo "</select>";
}
?>
</div>
 <div class="col-md-6 form-group">
<label >ESTADO :</label>
<select name="slcsta"  class="form-control">
?>
<option value="<?php echo $var12 ?>"><?php echo $var12 ?></option>
<option>ACTIVO</option>
<option>SUSPENDIDO</option>
<option>FINALIZADO</option>
</select>
</div>
 <div class="col-md-6 form-group">
    <input type="hidden" class="form-control" name="txtid" id="txtid" maxlength='50'  SIZE="50" value="<?php echo $var?>">
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
