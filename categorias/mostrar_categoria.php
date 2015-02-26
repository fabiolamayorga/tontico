<?php
require_once("conexion.php");
$query = "select * from categorias where codigo_categoria = '".$_GET['id']."'";
$result_query = mysql_query($query,$conexion) or die(mysql_error());
$texto_xml = "";
header('Content-Type: text/xml');
$texto_xml .= "<?xml version='1.0'?><registro>";
if (!$result_query)
{
$texto_xml .= "<error>1</error>";
}else{
$texto_xml .= "<error>0</error>";
$texto_xml .= "<numregistros>".mysql_num_rows($result_query)."</numregistros>"; 
$texto_xml .= "<codigo>" . $_GET['id']. "</codigo>";
while($row = mysql_fetch_array($result_query))
 {
$texto_xml .= "<nombre>" . $row['nombre'] . "</nombre>";
$texto_xml .= "<descripcion>" . $row['descripcion'] . "</descripcion>";
 }
}
$texto_xml .= "</registro>";
mysql_close($conexion); 
echo $texto_xml; 
?>