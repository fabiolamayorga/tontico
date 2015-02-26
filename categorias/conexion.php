<?php
$servidor="localhost";
$usuario = "root";
$clave = "";
$conexion = mysql_connect($servidor,$usuario,$clave);
if (!$conexion)
{
  die("No se pudo realizar la conexión"); 
}
$seleccion = mysql_select_db("clase",$conexion);
if (!$seleccion)
{
  die("No se pudo seleccionar la base de datos");
}
?>