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
    <link rel='stylesheet' type='text/css' href='../../../css/index.html'/>
  <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/css/bootstrap.css"/>

    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/estilos.css" rel="stylesheet">
  </head>
  <?PHP
  if(isset($_POST["btn1"])){
  $btn=$_POST["btn1"];
    if($btn=="Eliminar"){
    $id=$_POST["txtid"];
      
    $sql="delete from cliente where id ='$id'";
    
    $cs=mysqli_query($conexion,$sql);
    echo "<script> alert('Se elimnino correctamente');</script>";
    }
  }
 ?>
   <form action="listado_cliente.php" method="POST">
  <div class="container">

              <h3></h3>
               <table  class="table table-bordered table-striped" >
                  <tr >
               <th width="90%"  >
                      <h1 align="center">Listado de Clientes</h1>
                        <center>
                        <form name="form3" method="post" action="" class="form-search">
                            <input type="text" SIZE="40"  name="buscar" autocomplete="off"  placeholder="Buscar por Nombre o DNI / CUIL" onKeyUp="this.value=this.value.toUpperCase();">
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
        <th>Codigo</th>
        <th>Apellido y Nombre</th>
        <th>DNI</th>
        <th>Direccion</th>
        <th>Localidad</th>
        <th>Telefono</th>
          <th>Mail</th>
      </tr>
      </thead>
          
      <tbody>
                     <?php
            if(!empty($_POST['buscar'])){
            $buscar=limpiar($_POST['buscar']);
            $pame=mysqli_query($conexion,"SELECT * FROM cliente WHERE nombre LIKE '%$buscar%' or dni='$buscar' ORDER BY nombre"); 
          }else{
            $pame=mysqli_query($conexion,"SELECT * FROM cliente ORDER BY nombre");    
          }   
          while($row=mysqli_fetch_array($pame)){
            $url=cadenas().encrypt($row['id'],'URLCODIGO');
          ?>
                  <tr data-toggle="collapse" data-target="<?php echo '.art'.$cont;?>" class="accordion-toggle" aria-expanded="false">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['dni']; ?></td>
                    <td><?php echo $row['direccion']; ?></td>
                    <td><?php echo $row['localidad']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['mail']; ?></td>

                  </tr>
        <td class="accordian-body collapse <?php echo 'art'.$cont;?>" colspan="7">
          <div>
            <div class="media" style="padding: 10px;">
                        <div class="col-xs-12 media-right text-right">
                         
                        <?php echo "<a href='../../intranet/cliente/cliente.php?dni=$row[dni]' class='btn btn-primary'>MODIFICAR</a> ";?>
                        <button type="submit" name="btn1" value="Eliminar" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> ELIMINAR</button>
                        </form>
                        </div>
                    </div>
                  
        </td>
                            <?php $cont = $cont + 1; } ?>

      </tr>
</tbody>
</table>
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../../../js/responsive.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    
  </body>
</html>
