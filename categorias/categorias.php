<?php
class categorias{
public $mensaje;
public $codigo_registro;
public $nombre_registro;
public $descripcion_registro;
function insertar($codigo,$nombre,$descripcion,$conexion)
{
  $mensaje = "";
  try{
    $resultado = mysql_query("insert into categorias (codigo_categoria, nombre, descripcion, usuario_creacion, fecha_creacion) values (".$codigo.",'".$nombre."','".$descripcion."','system',NOW())",$conexion);
	if (!$resultado)
	{
	  throw new Exception(mysql_error()); 
	}else{
	  $this->mensaje = "El registro se creó correctamente";
	}
	return $resultado;
  }catch(Exception $e){
     throw new Exception($e->getMessage());	 
  }
}
function actualizar($codigo,$nombre,$descripcion,$conexion)
{
  try{
    $resultado = mysql_query("update categorias set 
	                          nombre = '" .$nombre."',
							  descripcion = '" .$descripcion."'
							  where codigo_categoria = '" .$codigo."'",$conexion);
	if (!$resultado)
	{
	 throw new Exception(mysql_error()); 
	}
	$this->mensaje = 'El registro se actualizó correctamente';
	return $resultado;
  }catch(Exception $e){
     throw new Exception($e->getMessage());
	 
  }
}
function eliminar($codigo,$conexion)
{
  try{
    $resultado = mysql_query("delete from categorias where 
	                          codigo_categoria = ".$codigo,$conexion);
	if (!$resultado)
	{
	  throw new Exception('Error al eliminar el registro:' || mysql_error()); 
	}
	if (mysql_num_rows() == 0){
	  throw new Exception('El registro que se intentó eliminar no existe.');  
	}
	$this->mensaje = "El registro se eliminó correctamente";
	return $resultado;
  }catch(Exception $e){
     throw new Exception($e->getMessage());
  }
}
function buscar_registro ($codigo, $conexion){
   try{
       $valor = 
	   $resultado = mysql_query("select * from categorias where codigo_categoria=".$codigo,$conexion);
	   if (!$resultado)
 	   {
         throw new Exception(mysql_error($resultado));	
	   }else
	   {
	     if (mysql_num_rows($resultado) == 0)
		 {
		   throw new Exception("El registro solicitado no existe");	
		 } 
		 while($row = mysql_fetch_array($resultado))
		 {
		   $this->codigo_registro = $row['codigo_categoria'];
   		   $this->nombre_registro = $row['nombre'];
  		   $this->descripcion_registro = $row['descripcion'];
		   $this->mensaje = 'El registro se recuperó correctamente';
		 } 
		 return $resultado;
	   }
   }catch(Exception $e){
      throw new Exception($e->getMessage());
   }
}
}

?>