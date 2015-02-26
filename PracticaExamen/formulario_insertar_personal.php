<?php
  $mensaje = "";  
  require_once("conexion.php");
  include_once("Personal.php");
  if ((isset($_POST['codigo_personal'],$_POST['nombre'],$_POST['estado'], $_POST['sexo'], $_POST['edad']))){
	  if ((trim($_POST['codigo_personal']) == "") || (trim($_POST['nombre']) == "") || (trim($_POST['estado']) == "") || (trim($_POST['sexo']) == "") || (trim($_POST['edad']) == "")){
  		 	$mensaje = "El código, el nombre y la descripción no pueden ir en blanco";

  		}else{
  		 	try{
  		 		$personal = new Personal;
  		 		$codigo_personal = $_POST['codigo_personal'];
  		 		$nombre = $_POST['nombre'];
  		 		$estado = $_POST['estado'];
  		 		$sexo = $_POST['sexo'];
  		 		$edad = $_POST['edad'];
  			  	$resultado_insertar = $personal->insertar($codigo_personal,$nombre,$estado,$sexo,$edad,$conexion);
			  	$mensaje = $personal->mensaje;
  		 	}catch (Exception $e){
  		 		$mensaje = $e->GetMessage();

  		 	}


  		 }

 }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Formulario Insertar</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="js/dropdown-menu.js"></script>
</head>
<body>
	<?php include_once("menu.php") ?>
	<form action="" method="POST">
		<table align="center">
		<tr>
			<td><label for="codigo_personal">Codigo Personal</label></td>
			<td><input type="text" name="codigo_personal" /></td>
		</tr>
		<tr>
			<td><label for="nombre">Nombre</label></td>
			<td><input type="text" name="nombre" /></td>
		</tr>
		<tr>
			<td><label for="estado">Estado</label></td>
			<td><input type="radio" name="estado" value="t"/><label for="">Disponible</label></td>
			<td><input type="radio" name="estado" value="f"/><label for="">Reservado</label></td>
		</tr>
		<tr>
			<td><label for="sexo">Sexo</label></td>
			<td><input type="radio" name="sexo" value="f"/><label for="">F</label></td>
			<td><input type="radio" name="sexo" value="m"/><label for="">M</label></td>
		</tr>
		<tr>
			<td><label for="edad">Edad</label></td>
			<td><input type="text" name="edad"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Enviar" width="100" height="100" />
		</tr>
		<tr>
			<td colspan="2" align="center"><span class="Mensaje" id="Mensaje"><?php echo $mensaje?></span></td>
		</tr>
		</table>
	</form>
</body>
</html>