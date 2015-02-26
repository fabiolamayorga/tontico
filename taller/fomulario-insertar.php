<?php 
  $mensaje = "";  
  require_once("conexion.php");
  include_once("Articulos.php");


  if ((isset($_POST['codigo_producto'],$_POST['nombre'],$_POST['descripcion'],$_POST['precio'])))
  {
	  if ((trim($_POST['codigo_producto']) == "") || (trim($_POST['nombre']) == "") || (trim($_POST['descripcion']) == "") || (trim($_POST['precio']) == ""))
	  {
		 $mensaje = "El código, el nombre y la descripción no pueden ir en blanco";
		 header("Location:formulario-insertar.php");
	  }
	  else
	  {
		  try{
			  $articulos = new Articulos;
			  $codigo = $_POST['codigo_producto'];
			  $nombre = $_POST['nombre'];
			  $precio = $_POST['precio'];
			  $descripcion = $_POST['descripcion'];
			  $resultado_insertar = $articulos->insertar($codigo,$nombre,$descripcion,$precio,$conexion);
			  $mensaje = $articulos->mensaje;			  	
		  }catch (Exception $e){
			$mensaje = $e->GetMessage();
		  }
      }
	} 
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Formulario insertar</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<h1>Formulario Insertar</h1>
		<?php
			include "menu.html"
		?>
		<table align="center">
			<form action="" method="POST">
				<tr>
					<td>Codigo del producto:</td>
					<td><input type="text" name="codigo_producto"></td>
				</tr>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="nombre"></td>
				</tr>
				<tr>
					<td>Precio:</td>
					<td><input type="text" name="precio"></td>
				</tr>
				<tr>
					<td>Descripcion:</td>
					<td><textarea name="descripcion" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="Enviar"></td>
				</tr>
				<tr>
					<td><span class="Mensaje" id="Mensaje"><?php echo $mensaje?></span></td>
				</tr>
			</form>
		</table>
	</body>
</html>