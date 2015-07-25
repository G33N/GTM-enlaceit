<?php
	
	$conexion = mysqli_connect("localhost","root","Seighei7","GTM-DMS");
  mysqli_query($conexion,"SET NAMES utf8");
	 mysqli_query($conexion,"SET CHARACTER_SET utf"); 
	$s='$'; 
	
	function limpiar($tags){
	 $tags = strip_tags($tags);
		return $tags;
	} 

	
?>
