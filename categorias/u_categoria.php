<?php
  require_once("conexion.php");
  include_once("categorias.php");
  if (!(isset($_POST['Code'],$_POST['Nombre'],$_POST['Descripcion'])))
  {
     header("Location:form_u_categoria.php?errorno=1");
	 exit();
  }
  if ((trim($_POST['Code']) == "") || (trim($_POST['Nombre']) == "") || (trim($_POST['Descripcion']) == ""))
  {
     header("Location:form_u_categoria.php?errorno=2");
	 exit();
  }
  try{
  $categoria = new categorias;
  $codigo = $_POST['Code'];
  $nombre = $_POST['Nombre'];
  $descripcion = $_POST['Descripcion'];
  $resultado_update = $categoria->actualizar($codigo,$nombre,$descripcion,$conexion);
  if ($resultado_update == 0)
  {
    header("Location:form_u_categoria.php?errorno=4");
    exit;
  }
  }catch (Exception $e){
    echo $e->GetMessage();
  }
?>