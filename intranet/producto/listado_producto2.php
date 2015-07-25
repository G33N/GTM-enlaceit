<?php 
	session_start();
	include_once "../../conexion/php_conexion.php";
	include_once "funciones.php";
	include_once "class_buscar.php";
	require("../../css/cabecera.php");
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
  <div class="container">

              <h3></h3>
            	<table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                    	<h1 align="center">Listado de Productos</h1>
                        <center>
                      	<form name="form3" method="post" action="" class="form-search">
                        		<input type="text" SIZE="40"  name="buscar" autocomplete="off"  placeholder="Buscar por descripcion o codigo">
                         <button type="submit" name="buton" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> BUSCAR</button>
                    	</form>
                        </center>
                    </th>
                  </tr>
                </table>
            
                <br>
              <table class="table table-bordered table-striped">
                  <tr class='even'>
                    <th><strong>Codigo</strong></th>
                    <th><strong>Descripcion</strong></th>
					<th><strong>Precio</strong></th>
                    <th><strong>Stock</strong></th>
                    <th><strong>Agregar</strong></th>
                       
                  </tr>
                     <?php
				  	if(!empty($_POST['buscar'])){
						$buscar=limpiar($_POST['buscar']);
						$pame=mysqli_query($conexion,"SELECT * FROM producto WHERE descripcion LIKE '%$buscar%' or codpro='$buscar' ORDER BY id");	
					}else{
						$pame=mysqli_query($conexion,"SELECT * FROM producto ORDER BY id");		
					}		
					while($row=mysqli_fetch_array($pame)){
						$url=cadenas().encrypt($row['id'],'URLCODIGO');
				  ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
      		    	<td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
		    		<td><center><?php echo "<a href='../../intranet/venta/mov_ingreso.php?var=$row[id]' class='btn btn-primary'>AGREGAR</a> ";?></center></td>
                  </tr>
                  <?php } ?>
                </table>
            </td>
          </tr>
        </table>
          <center><a href="../../intranet/venta/mov_ingreso.php" class="btn btn-primary">REGISTRAR FACTURA</a></center>
 
    </div>
    
 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../../../js/responsive.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    
  </body>
</html>
