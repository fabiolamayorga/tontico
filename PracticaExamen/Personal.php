<?php
class Personal{
	public $mensaje;
	public $codigo_personal;
	public $nombre;
	public $estado;
	public $sexo;
	public $edad;

	function insertar($codigo_personal,$nombre,$estado, $sexo, $edad, $conexion){
	  $mensaje = "";
	  try{
	    //$resultado = mysql_query("insert into Personal (Codigo_personal, Nombre, Estado, Sexo, Edad) values (".$codigo_personal.",'".$nombre."','".$estado."','".$sexo."','".$edad."' )",$conexion);
	   	$resultado = mysql_query("insert into Personal (Codigo_personal, Nombre, Estado, Sexo, Edad) values ('$codigo_personal','$nombre', '$estado', '$sexo', '".$edad."' )",$conexion);

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

function buscar_registro(){
	   try{
	       $valor = 
		   $resultado = mysql_query("select * from Personal where Codigo_personal=".$codigo_personal,$conexion);
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
			   $this->nombre = $row['Nombre'];
	   		   $this->estado = $row['Estado'];
	  		   $this->sexo = $row['Sexo'];
	  		   $this->edad = $row['Edad']
			   $this->mensaje = 'El registro se recuperó correctamente';
			 } 
			 return $resultado;
		   }
	   }catch(Exception $e){
	      throw new Exception($e->getMessage());
	   }
	}	
	

?>