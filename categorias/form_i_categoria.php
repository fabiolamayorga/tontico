<?php 
  $mensaje = "";  
  require_once("conexion.php");
  include_once("categorias.php");
  if ((isset($_POST['Codigo'],$_POST['Nombre'],$_POST['Descripcion'])))
  {
	  if ((trim($_POST['Codigo']) == "") || (trim($_POST['Nombre']) == "") || (trim($_POST['Descripcion']) == ""))
	  {
		 $mensaje = "El código, el nombre y la descripción no pueden ir en blanco";
	  }
	  else
	  {
		  try{
			  $categoria = new categorias;
			  $codigo = $_POST['Codigo'];
			  $nombre = $_POST['Nombre'];
			  $descripcion = $_POST['Descripcion'];
			  $resultado_insertar = $categoria->insertar($codigo,$nombre,$descripcion,$conexion);
			  $mensaje = $categoria->mensaje;			  	
		  }catch (Exception $e){
			$mensaje = $e->GetMessage();
		  }
      }
	} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejercicio con formularios</title>
</head>
<body>
<table align="center"><form action="form_i_categoria.php" method="post" onkeypress="document.getElementById('Mensaje').innerHTML = ''">
<tr>
<td><span class="Estilo1">Código:</span></td>
<td><span class="Estilo1"><input type="text" name="Codigo" /></span></td>
</tr>
<tr>
<td><span class="Estilo1">Nombre:</span></td>
<td><span class="Estilo1"><input type="text" name="Nombre" /></span></td>
</tr>
<tr>
<td><span class="Estilo1">Descripción:</span></td>
<td><textarea name="Descripcion" cols="21" rows="5" ></textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Enviar" width="100" height="100" />
</tr>
<tr>
<td colspan="2" align="center"><span class="Mensaje" id="Mensaje"><?php echo $mensaje?></span></td>
</tr></form>
</table>
</body>
</html>
