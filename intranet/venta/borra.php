<?php 
   include("php_conexion2.php"); 
   //$conexion=Conectarse(); 
   $id=$_GET['id'];
   mysqli_query($conexion,"delete from detalleventa where id = $id"); 
   mysqli_query($conexion,"delete from temporal where id = $id"); 
   header("Location: mov_ingreso.php"); 
?> 