<?php 
  $mensaje = "";
  $nombre = "";
  $descripcion = "";
  $inhabilitar_llave = "N";
  require_once("conexion.php");
  include_once("categorias.php");
  if (isset($_GET['id']))
  {
    if (!$_GET['id'] == "")
	{
	  $codigo = $_GET['id'];
      try{
		$categoria = new categorias;
	    $resultado_consulta = $categoria->buscar_registro($codigo,$conexion);
     	$codigo = $categoria->codigo_registro;
	    $nombre = $categoria->nombre_registro;			  
		$descripcion = $categoria->descripcion_registro;
		$mensaje = $categoria->mensaje;	
		$inhabilitar_llave = "S";		  	
      }catch (Exception $e)
	     {
			$mensaje = $e->GetMessage();
	     }
    }		 
  }
  if ((isset($_POST['Code'],$_POST['Nombre'],$_POST['Descripcion'])))
  {
      echo $_POST['Code'];
	  echo $_POST['Nombre'];
	  echo $_POST['Descripcion'];
	  if ((trim($_POST['Code']) == "") || (trim($_POST['Nombre']) == "") || (trim($_POST['Descripcion']) == ""))
	  {
		 $mensaje = "El código, el nombre y la descripción no pueden ir en blanco";
	  }
	  else
	  {
		  try{
			  $categoria = new categorias;
			  $codigo = $_POST['Codigo'];
			  $nombre = $_POST['Nombre'];
			  $descripcion = $_POST['Descripcion'];
			  $resultado_insertar = $categoria->actualizar($codigo,$nombre,$descripcion,$conexion);
			  $mensaje = $categoria->mensaje;			  	
		  }catch (Exception $e){
			$mensaje = $e->GetMessage();
		  }
      }
	} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejercicio con formularios</title>
<script>
function asignar_variable_escondida()
{
   document.getElementById('Code').value = document.getElementById('Codigo').value;
}
function llamar_pantalla(){
   asignar_variable_escondida();
   parent.location='form_u_categoria.php?id=' + document.getElementById('Code').value;
} 
function limpiar_pantalla(){
   parent.location='form_u_categoria.php';
}
function inicializar(){
   var inhabilitar_llave = '<? echo $inhabilitar_llave;?>';
   if (inhabilitar_llave == 'S'){
      document.getElementById("Codigo").disabled = true; 
   }else{
      document.getElementById("Codigo").disabled = false; 
   }   
}
</script>
</head>
<body onload="inicializar();">
<table align="center">
<form action="form_u_categoria.php" method="POST" id="Formulario">
<tr>
<td><span class="Estilo1">Código:</span></td>
<td><span class="Estilo1"><input type="text" name="Codigo" id="Codigo" value="<?php echo $codigo;?>"/></span></td>
</tr>
<tr>
<td><span class="Estilo1">Nombre:</span></td>
<td><span class="Estilo1"><input type="text" name="Nombre" id="Nombre" value="<?php echo $nombre;?>"/></span></td>
</tr>
<tr>
<td><span class="Estilo1">Descripción:</span></td>
<td><textarea name="Descripcion" cols="21" rows="5" id="Descripcion"><?php echo $descripcion;?></textarea></td>
</tr>
<tr>
  <td colspan="2" align="center">&nbsp;&nbsp;
    <input type="button" value="Buscar" name="Buscar" id="Buscar" onclick="llamar_pantalla();" />&nbsp;&nbsp;<input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="asignar_variable_escondida();"/>&nbsp;&nbsp;<input type="button" value="Cancelar" name="Cancelar" id="Cancelar" onclick="limpiar_pantalla();" /> 
	<input type="hidden" name="Code" id="Code" />
</tr>
<tr>
<td colspan="2" align="center"><span class="Mensaje" id="Mensaje"><?php echo $mensaje;?></span></td>
</tr></form>
</table>
</body>
</html>
