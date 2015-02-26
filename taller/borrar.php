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
					<td>Codigo Articulos:</td>
					<td><textarea name="codigo_articulos" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="button" value="Enviar"></td>
				</tr>
			</form>
		</table>
	</body>
</html>