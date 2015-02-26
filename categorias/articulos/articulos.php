<?php
class articulos{
function insertar($codigo,$nombre,$descripcion,$conexion)
{
  try{
    $resultado = mysql_query("insert into articulos (codigo_articulo, nombre, descripcion, usuario_creacion, fecha_creacion) values ('".$codigo."','".$nombre."','".$descripcion."','system',NOW())",$conexion) or die(mysql_error());
	if (!$resultado)
	{
	 throw new Exception('Error al insertar'); 
	}
	return $resultado;
  }catch(Exception $e){
     throw new Exception($e->getMessage());
  }
}

function modificar($codigo,$nombre,$descripcion,$conexion)
{
  try{
    $resultado = mysql_query("update articulos set nombre = '" .$nombre. "', descripcion = '" .$descripcion. "' 
	                           where codigo = " .$codigo, $conexion) or die(mysql_error());
	if (!$resultado)
	{
	 throw new Exception('Error al actualizar'); 
	}
	return $resultado;
  }catch(Exception $e){
     throw new Exception($e->getMessage());
  }
}

function eliminar($codigo, $conexion)
{
  try{
    $resultado = mysql_query("delete from articulos where codigo = " .$codigo, $conexion) or die(mysql_error());
	if (!$resultado)
	{
	 throw new Exception('Error al eliminar'); 
	}
	return $resultado;
  }catch(Exception $e){
     throw new Exception($e->getMessage());
  }
}
}
?>