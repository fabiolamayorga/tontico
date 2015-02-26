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
			<form action="" method="">
				<tr>
					<td>Codigo del producto:</td>
					<td><input type="text" name="codigo_producto" disabled></td>
				</tr>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="nombre" disabled></td>
				</tr>
				<tr>
					<td>Precio:</td>
					<td><input type="text" name="precio" disabled></td>
				</tr>
				<tr>
					<td>Descripcion:</td>
					<td><textarea name="descripcion" id="" cols="30" rows="10" disabled></textarea></td>
				</tr>
				<tr>
					<td><input type="button" value="Enviar"></td>
				</tr>
			</form>
		</table>
	</body>
</html>