<?php
  $mensaje = "";  
  require_once("conexion.php");
  include_once("Cita.php");
  if ((isset($_POST['codigo_personal'],$_POST['codigo_especialidades'],$_POST['fecha'], $_POST['hora'],$_POST['nombre_cliente'], $_POST['observaciones']))){
	  if ((trim($_POST['codigo_personal']) == "") || (trim($_POST['codigo_especialidades']) == "") || (trim($_POST['fecha']) == "") || (trim($_POST['hora']) == "") || (trim($_POST['nombre_cliente']) == "") || (trim($_POST['observaciones']) == "")){
  		 	$mensaje = "El código, el nombre y la descripción no pueden ir en blanco";

  		}else{
  		 	try{
  		 		$cita = new Cita;
  		 		$codigo_personal = $_POST['codigo_personal'];
  		 		$codigo_especialidades = $_POST['codigo_especialidades'];
  		 		$fecha = $_POST['fecha'];
  		 		$hora = $_POST['hora'];
  		 		$nombre_cliente = $_POST['nombre_cliente'];
  		 		$observaciones = $_POST['observaciones'];
  			  	$resultado_insertar = $cita->insertar($codigo_personal,$codigo_especialidades,$fecha,$hora,$nombre_cliente,$observaciones,$conexion);
			  	$mensaje = $cita->mensaje;
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
			<td><label for="codigo_especialidades">Codigo Especialidades</label></td>
			<td><input type="text" name="codigo_especialidades" /></td>
		</tr>
		<tr>
			<td><label for="fecha">Fecha</label></td>
			<td><input type="text" name="fecha" /></td>
		</tr>
		<tr>
			<td><label for="hora">Hora</label></td>
			<td><input type="text" name="hora" /></td>
		</tr>
		<tr>
			<td><label for="nombre_cliente">Nombre del Cliente</label></td>
			<td><input type="text" name="nombre_cliente" /></td>
		</tr>
		<tr>
			<td><label for="observaciones">Observaciones</label></td>
			<td><input type="text" name="observaciones" /></td>
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