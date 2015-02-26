
<?php
  require_once("Connections/conexion.php");
  $query = "insert into Articulos (codigo_articulo, nombre, descripcion, precio) values ('CHOC-01','Chocolate','Chocolate deliciosamente preparado',5500)";
  $resultado = mysql_query($query,$conexion) or die(mysql_error());
  if ($resultado == 0)
  {
    echo "No fue posible insertar el registro";
	exit;
  }
  echo "El registro se insertó correctamente";
?>
