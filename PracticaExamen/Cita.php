<?php
class Cita{
	public $mensaje;
	public $codigo_especialidades;
	public $codigo_personal;
	public $fecha;
	public $hora;
	public $nombre_cliente;
	public $observaciones;

	function insertar($codigo_especialidades,$codigo_personal,$fecha,$hora,$nombre_cliente, $observaciones, $conexion){
	  $mensaje = "";
	  try{
	    //$resultado = mysql_query("insert into Personal (Codigo_personal, Nombre, Estado, Sexo, Edad) values (".$codigo_personal.",'".$nombre."','".$estado."','".$sexo."','".$edad."' )",$conexion);
	   	$resultado = mysql_query("insert into Citas (Codigo_personal, Codigo_especialidad, Fecha, Hora, Nombre_cliente, Observaciones) values ('$codigo_personal','$codigo_especialidades', '$fecha', '$hora', '$nombre_cliente', '$observaciones' )",$conexion);

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