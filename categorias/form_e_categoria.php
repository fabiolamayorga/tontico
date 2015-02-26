<?php 
  $mensaje = "";
  if (isset($_GET['errorno']))
  {
    if ($_GET['errorno'] == 1)
	{
	  $mensaje = "La pantalla de inserción debe abrirse desde el formulario";
	}
	if ($_GET['errorno'] == 2)
	{
	  $mensaje = "No puede dejar espacios en blanco en el formulario";
	}
    if ($_GET['errorno'] == 3)
	{
	  $mensaje = "El nombre ingresado ya existe en la base de datos";
	}
	if ($_GET['errorno'] == 4)
	{
	  $mensaje = "Error al insertar en la base de datos";
	}
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="buscar.js"></script>
<title>Ejercicio con formularios</title>
</head>
<body>
<table align="center">
<form action="
" method="post" onkeydown="limpiar_campos();" id="Formulario">
<tr>
<td><span class="Estilo1">Código:</span></td>
<td><span class="Estilo1"><input type="text" name="Codigo" id="Codigo" /></span></td>
</tr>
<tr>
<td><span class="Estilo1">Nombre:</span></td>
<td><span class="Estilo1"><input type="text" name="Nombre" id="Nombre" /></span></td>
</tr>
<tr>
<td><span class="Estilo1">Descripción:</span></td>
<td><textarea name="Descripcion" cols="21" rows="5" id="Descripcion" ></textarea></td>
</tr>
<tr>
  <td colspan="2" align="center">&nbsp;&nbsp;
    <input type="button" value="Buscar" name="Buscar" id="Buscar" onclick="mostrarcategoria(document.getElementById('Codigo').value);" />
</tr>
<tr>
<td colspan="2" align="center"><span class="Mensaje" id="Mensaje"><?php echo $mensaje?></span></td>
</tr></form>
</table>
</body>
</html>
