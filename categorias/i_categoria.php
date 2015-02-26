<?php
  require_once("conexion.php");
  include_once("categorias.php");
  if (!(isset($_POST['Codigo'],$_POST['Nombre'],$_POST['Descripcion'])))
  {
     header("Location:form_u_categoria.php?errorno=1");
	 exit();
  }
  if ((trim($_POST['Codigo']) == "") || (trim($_POST['Nombre']) == "") || (trim($_POST['Descripcion']) == ""))
  {
     header("Location:form_i_categoria.php?errorno=2");
	 exit();
  }
  try{
  $categoria = new categorias;
  $codigo = $_POST['Codigo'];
  $nombre = $_POST['Nombre'];
  $descripcion = $_POST['Descripcion'];
  $num_repetidos = $categoria->buscar_duplicados($codigo,$nombre,$conexion);
  if ($num_repetidos > 0)
  {
    header("Location:form_i_categoria.php?errorno=3");
    exit();
  }  
  $resultado_insertar = $categoria->insertar($codigo,$nombre,$descripcion,$conexion);
  if ($resultado_insertar == 0)
  {
    header("Location:form_i_categoria.php?errorno=4");
    exit;
  }
  echo "El registro se insertó correctamente";
  }catch (Exception $e){
    echo $e->GetMessage();
  }
?>