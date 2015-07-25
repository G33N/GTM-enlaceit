<!DOCTYPE HTML>
<html lang="es">
<head>
<title>Sistema GTM"</title>

</head>
<body>
<!-- Start your code here -->
<div class="navbar navbar-inverse"> 
        <a class="navbar-brand" href="#">SISTEMA GTM</a> 
        <ul class="nav navbar-nav"> 
          
                <li class="active">

				<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-home"></span> INICIO<b class="caret"></b></a> 
				         <ul class="dropdown-menu"> 
         <li class='has-sub'><a href='../../inicio/inicio/inicio.php'><span>Inicio</span></a> 
         </li>
     
      </ul>
           
				 </li>
				
				<li class="active"> 
                 <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-wrench"></span> MANTENIMIENTO<b class="caret"></b></a> 
               <ul class="dropdown-menu"> 
         <li class='has-sub'><a href='../../intranet/cliente/cliente.php'><span>CLIENTE</span></a> 
         </li>
         <li class='has-sub'><a href='../../intranet/orden/orden.php'><span>ORDENES DE SERVICIO</span></a> 
         </li>
		  <li class='has-sub'><a href='../../intranet/producto/producto.php'><span>PRODUCTO</span></a> 
         </li>
		  <li class='has-sub'><a href='../../intranet/categoria/categoria.php'><span>CATEGORIA</span></a> 
         </li>
		 <li class='has-sub'><a href='../../intranet/usuarios/usuario.php'><span>USUARIO</span></a>
         </li>
      </ul>
                </li>
				
				
				<li class="active"> 
                 <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-search"></span> CONSULTAS<b class="caret"></b></a> 
               <ul class="dropdown-menu"> 
   
         <li class='has-sub'><a href="../../intranet/producto/listado_producto.php"><span>STOCK</span></a> 
         </li>
		 <li class='has-sub'><a href="../../intranet/cliente/listado_cliente.php"><span>CLIENTES</span></a> 
         </li>
         <li class='has-sub'><a href="../../intranet/orden/listado_orden.php"><span>ORDENES DE SERVICIO</span></a> 
         </li>
		
      
      </ul>
                </li>
				
							<li class="active"> 
                 <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-shopping-cart"></span> FACTURACION<b class="caret"></b></a> 
                <ul class="dropdown-menu"> 
                <li class='has-sub'><a href="../../intranet/venta/mov_ingreso.php"><span>REGISTRAR</span></a> 
         		</li>
                <li class='has-sub'><a href="../../intranet/venta/mov_presupuesto.php"><span>PRESUPUESTO</span></a> 
         		</li> 
		
      </ul>
          </li>
				
					<li class="active"> 
                 <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-list-alt"></span> REPORTES<b class="caret"></b></a> 
               <ul class="dropdown-menu"> 
   
         <li class='has-sub'><a href="#"><span>PRODUCTOS</span></a> 
         </li>
		    <li class="divider"></li> 
		  <li class='has-sub'><a href="#"><span>VENTAS</span></a> 
         </li>
         	<li class="divider"></li> 
		  <li class='has-sub'><a href="../../reporte/graficos/reporte1.php"><span>ORDENES DE SERVICIOS</span></a> 
         </li>
		 		
		 
      </ul>
                </li>

				<li class="active"> 
                 <a class="dropdown-toggle" href="../../cerrar.php" data-toggle="dropdown"> <span class="glyphicon glyphicon-off"></span> SALIR<b class="caret"></b></a> 
                  <ul class="dropdown-menu"> 
         <li class='has-sub'><a href='../../cerrar.php'><span>Salir</span></a> 
         </li>
     
      </ul>
          </li>
               
        </ul> 
</div>
 
</body>
</html>
</html><html lang="es">
<head>
<title>Sistema GTM"</title>

     <script type="text/javascript" src="../../js/jquery.min.js"></script>
     <script type="text/javascript" src="../../js/bootstrap.js"></script>
     <link type="text/css" rel="stylesheet" href="../../css/css/bootstrap.css"/>

     <link href="../../css/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../css/css/estilos.css" rel="stylesheet">
</head>
<body>
<div class="col-xs-12">
<center><h2>GESTION DE SERVICIO</h2></center>
</div>
<div class="col-xs-3">
<div class="thumbnail">
      <img src="img/file98.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../intranet/orden/orden.php" class="btn btn-primary">REGISTRAR ORDEN</a>
 
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3">
<div class="thumbnail">
          <img src="img/search102.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../intranet/orden/listado_orden.php" class="btn btn-primary">CONSULTAR ORDEN</a>
 
          </p>
      </div>
   </div>
 </div>
  <div class="col-xs-3">
<div class="thumbnail">
      <img src="img/note16.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../intranet/venta/mov_presupuesto.php" class="btn btn-primary">NUEVO PRESUPUESTO</a>
 
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3">
<div class="thumbnail">
      <img src="img/ascendant6.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../reporte/graficos/reporte1.php" class="btn btn-primary">REPORTE SERVICIOS</a>
 
          </p>
      </div>
   </div>
 </div> 
<div class="col-xs-12">
<center><h2>GESTION DE STOCK Y FACTURACION</h2></center>
</div><div class="col-xs-3">
<div class="thumbnail">
      <img src="img/full22.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../intranet/producto/producto.php" class="btn btn-primary">REGISTRAR PRODUCTO</a>
 
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3">
<div class="thumbnail">
          <img src="img/factory3.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../intranet/producto/listado_producto.php" class="btn btn-primary">CONSULTAR STOCK</a>
 
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3">
<div class="thumbnail">
      <img src="img/shopping145.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="../../intranet/venta/mov_ingreso.php" class="btn btn-primary">REGISTRAR FACTURA</a>
 
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-3">
<div class="thumbnail">
      <img src="img/ascendant6.png" alt="imagen">
      <div class="caption">
       
          <p align="center">
          <a href="#" class="btn btn-primary">REPORTE VENTAS</a>
 
          </p>
      </div>
   </div>
 </div>
 <div class="col-xs-12">
	<p align="center">Copyright © 2014. Sistema GTM  1.0 Link State- All Rights Reserved </p>
</div>
</body>
</html>
