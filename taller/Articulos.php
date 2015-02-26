<?php
class Articulos{
public $mensaje;
public $codigo_registro;
public $nombre_registro;
public $descripcion_registro;

	function insertar($codigo, $nombre, $descripcion, $precio,$conexion){
        try{
        	$resultado = mysql_query("insert into Articulos(codigo_articulos,nombre,descripcion,precio, usuario, fecha_creacion)
        		values('".$codigo."',
    '".$nombre."','".$descripcion."','".$precio."','system',NOW())",$conexion);
        	if(!$resultado){
        		throw new Exception(mysql_error());	
        	}else{
                $this->mensaje = "El registro se creo correctamente";
            }
        	return $resultado;
        }catch(Exception $e){
        	throw new Exception($e->getMessage());
        	
        }
    }

	function modificar($codigo, $nombre, $descripcion, $conexion){
        try{
        	$resultado = mysql_query("update Articulos set nombre = '" .$nombre."',descripcion='".$descripcion. "' where codigo".$codigo ) or die(mysql_error());
        	if(!$resultado){
        		throw new Exception("Error al insertar");
        		
        	}
        	return $resultado;
        }catch(Exception $e){
        	throw new Exception($e->getMesage());
        	
        }
    }
}



?>