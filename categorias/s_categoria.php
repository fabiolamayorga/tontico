<?php
	$paq=0;
	require_once("conexion.php");
	if(isset($_GET['paq']))
	{
		$paq=($_GET['paq']-1);
	}
	$registros=mysql_query("select * from categorias", $conexion);
	$total_pages=ceil(mysql_num_rows($registros)/3)-1;
	$startat=$paq*3;
	$query_select=mysql_query("select * from categorias LIMIT ".$startat.",3",$conexion) or die (mysql_error);
	$tabla='<table align="center" width="75%" border="1">';
	$tabla.='<tr><td></td><td></td><td><span> Codigo </span></td><td>Nombre</td><td>Descripción</td></tr>';
	$registro_actual=mysql_fetch_assoc($query_select);
	do{
$tabla .="<tr><td align='center'><a href='eliminar.php?id=".$registro_actual['codigo_categoria']."'a><img src='eliminar.png' width='25' heigth='25'></a></td><td align='center'><a href='modificar.php?id=".$registro_actual['codigo_categoria']."' a><img src='actualizar.png' width='25' heigth='25'></a></td><td>".$registro_actual['codigo_categoria']."</td><td>".$registro_actual['nombre']."</td><td>".$registro_actual['descripcion']."</td></tr>";
	}while($registro_actual=mysql_fetch_assoc($query_select));
	if ($total_pages > 0){		
		$tabla.='<tr><td colspan="5" align="center">';
		$pag_bandera=0;
		do{
	   		if($paq==$pag_bandera){
				$tabla.= ($pag_bandera+1).'&nbsp;';
			}else{
				$tabla.='<a href="mostrar2.php?paq='.($pag_bandera + 1).'">'.($pag_bandera+1).'</a>&nbsp;';
			}	   	
	   		$pag_bandera ++;
		}while($pag_bandera<= $total_pages);
		$tabla.='</td></tr>';
	}
	$tabla.='</tabla>';		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mostrar</title>
</head>
<body><?php echo $tabla;?></body>
</html>
