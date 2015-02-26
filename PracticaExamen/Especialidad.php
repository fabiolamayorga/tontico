<?php
class Especialidad{
	public $mensaje;
	public $codigo_especialidades;
	public $nombre;
	public $estado;

	function insertar($codigo_especialidades,$nombre,$estado, $conexion){
	  $mensaje = "";
	  try{
	    //$resultado = mysql_query("insert into Personal (Codigo_personal, Nombre, Estado, Sexo, Edad) values (".$codigo_personal.",'".$nombre."','".$estado."','".$sexo."','".$edad."' )",$conexion);
	   	$resultado = mysql_query("insert into Especialidades (Codigo_especialidades, Nombre, Estado) values ('$codigo_especialidades','$nombre', '$estado')",$conexion);

		if (!$resultado)
		{
		  throw new Exception(mysql_error()); 
		}else{
		  $this->mensaje = "El registro se cre&oacute; correctamente";
		}
		return $resultado;
	  }catch(Exception $e){
	     throw new Exception($e->getMessage());	 
	  }		
	}

	function modificar(){}

	function eliminar(){}


}
?>