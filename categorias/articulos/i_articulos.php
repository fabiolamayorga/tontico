<?php
  require_once("conexion.php");
  include_once("articulos.php");
  if (!(isset($_POST['Codigo'],$_POST['Nombre'],$_POST['Descripcion'])))
  {
     header("Location:formulario_i_articulos.php?errorno=1");
	 exit();
  }
  if ((trim($_POST['Codigo']) == "") || (trim($_POST['Nombre']) == "") || (trim($_POST['Descripcion']) == ""))
  {
     header("Location:formulario_i_articulos.php?errorno=2");
	 exit();
  }
  try{
  $articulo = new articulos;
  $codigo = $_POST['Codigo'];
  $nombre = $_POST['Nombre'];
  $descripcion = $_POST['Descripcion'];
  $resultado_insertar = $articulo->insertar($codigo,$nombre,$descripcion,$conexion);
  if ($resultado_insertar == 0)
  {
    header("Location:formulario.php?errorno=4");
    exit;
  }
  echo "El registro se insertó correctamente";
  }catch (Exception $e){
    echo $e->GetMessage();
  }
?>