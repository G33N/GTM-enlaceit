<?php 
	session_start();
	include_once "../../conexion/php_conexion.php";
	include_once "funciones.php";
	include_once "class_buscar.php";
	require("../../css/cabecera.php");
	$cont=0;
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
<?PHP
  if(isset($_POST["btn1"])){
	$btn=$_POST["btn1"];
		if($btn=="Eliminar"){
		$id=$_POST["txtid"];
			
		$sql="delete from orden where id ='$id'";
		
		$cs=mysqli_query($conexion,$sql);
		echo "<script> alert('Se elimnino correctamente');</script>";
		}
	}
 ?>
 <form action="listado_orden.php" method="POST">
  <div class="container">

              <h3></h3>
            	<table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                    	<h1 align="center">Listado de Ordenes</h1>
                        <center>
                      	<form name="form3" method="post" action="" class="form-search">
                        		<input type="text" SIZE="40"  name="buscar" placeholder="Buscar por patente, codigo o estado" onKeyUp="this.value=this.value.toUpperCase();">
                         <button type="submit" name="buton" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                    	</form>
                        </center>
                    </th>
                  </tr>
                </table>
            
                <br>
              	  
		<table class="table table-hover table-bordered table-striped" style="border-collapse:collapse;">
        
		  <thead>
			<tr>
				<th>Patente</th>
				<th>Modelo</th>
				<th>Cliente</th>
				<th>Ingreso</th>
				<th>Salida</th>
				<th>Estado</th>
			</tr>
		  </thead>
          
		  <tbody>
            <!-- Fila 1 -->
            <?php
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysqli_query($conexion,"SELECT * FROM  orden WHERE patente LIKE '%$buscar%' or id='$buscar' or estado='$buscar' ORDER BY id");	
					}else{
						$pame=mysqli_query($conexion,"SELECT * FROM orden ORDER BY id");		
					}		
					while($row=mysqli_fetch_array($pame)){
						$url=cadenas().encrypt($row['id'],'URLCODIGO');
                   echo "<input type='hidden' class='form-control' name='txtid' id='txtid' value='$row[id]'>";
				  ?>
                  <tr data-toggle="collapse" data-target="<?php echo '.art'.$cont;?>" class="accordion-toggle" aria-expanded="false">
                    <td><?php echo $row['patente']; ?></td>
                    <td><?php echo $row['modelo']; ?></td>
      		    	<td><?php echo $row['cliente']; ?></td>
                    <td><?php echo $row['ingreso']; ?></td>
                    <td><?php echo $row['salida']; ?></td>
                    <td class="text-center"><?php if($row['estado'] == 'ACTIVO'){ echo "<button type='button' class='btn btn-warning btn-sm'>$row[estado]</button></td>";}if($row['estado'] == 'SUSPENDIDO'){ echo "<button type='button' class='btn btn-danger btn-sm'>$row[estado]</button>";}if($row['estado'] == 'FINALIZADO'){ echo "<button type='button' class='btn btn-success btn-sm'>$row[estado]</button>";}?></td>
                  </tr>
				<td class="accordian-body collapse <?php echo 'art'.$cont;?>" colspan="6">
				  <div>
    				<div class="media" style="padding: 10px;">
                      <div class="col-xs-4 media-left text-left">
						<h4>Combustible</h4>
                        <p><?php echo $row['combustible'];?></p>
                        <h4>Auxilio</h4>
                        <p><?php echo $row['auxilio'];?></p>
                        <h4>Estereo</h4>
                        <p><?php echo $row['estereo'];?></p>
                      </div>
                      
                      <div class="media-body">
                      <div class="col-xs-6">
						<h3 class="media-heading">Solicitud de Trabajo</h3>
						<p><?php echo $row['trabajo'];?></p>
                      </div>
                        <div class="col-xs-6">
                        <h3 class="media-heading">Descripcion de Operaciones</h3>
						<p><?php echo $row['descripcion'];?></p>
                        </div>
                      </div>
                        <div class="col-xs-12 media-right text-right">
                         
                        <?php echo "<a href='../../intranet/orden/orden.php?pat=$row[patente]&ing=$row[ingreso]' class='btn btn-primary'>MODIFICAR</a> ";?>
                        <?php echo "<button type='button' class='btn btn-warning' onClick=window.open(this.href='../../reporte/fpdf7/iorden.php?idor=$row[id]')><span class='glyphicon glyphicon-save'></span>IMPRIMIR</button>";?>
                        <button type="submit" name="btn1" value="Eliminar" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> ELIMINAR</button>
                        </form>
                        </div>
                    </div>
                  
				</td>
                           	<?php $cont = $cont + 1; } ?>

			</tr>
</tbody>
</table>
          <center><a href="../../intranet/orden/orden.php" class="btn btn-primary">REGISTRAR ORDEN</a></center>
 
    
 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../../../js/responsive.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    
  </body>
</html>
