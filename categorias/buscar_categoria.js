var xmlHttp;
var tipouso;
function mostrarcategoria(str, uso)
 { 
if (document.getElementById("Codigo").value == ""){
  alert("Debe ingresar el código a consultar");
}  
xmlHttp=GetXmlHttpObject()
tipouso=uso;
 if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
 var url="mostrar_categoria.php";
 url=url+"?id="+str;
 url=url+"&sid="+Math.random();
 xmlHttp.onreadystatechange=stateChanged;
 xmlHttp.open("GET",url,true);
 xmlHttp.send();
 return false;  
 }
 
 function stateChanged() 
{ //1
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ //2
 xmlDoc=xmlHttp.responseXML;
 if (xmlDoc.getElementsByTagName("error")[0].childNodes[0].nodeValue == 0)
 { //3
    if (xmlDoc.getElementsByTagName("numregistros")[0].childNodes[0].nodeValue > 0)
	{ //4
	document.getElementById("Codigo").value = xmlDoc.getElementsByTagName("codigo")[0].childNodes[0].nodeValue;
	document.getElementById("Nombre").value = xmlDoc.getElementsByTagName("nombre")[0].childNodes[0].nodeValue;
	document.getElementById("Descripcion").innerHTML = xmlDoc.getElementsByTagName("descripcion")[0].childNodes[0].nodeValue;
	document.getElementById("Mensaje").innerHTML = "";
	//ACTUALIZAR
	if (tipouso == 'M'){
		document.getElementById('Code').value = document.getElementById("Codigo").value;
		document.getElementById("Codigo").disabled = true;
		document.getElementById("Nombre").disabled = false;
		document.getElementById("Descripcion").disabled = false;
	}
	//ELIMINAR
	if (tipouso == 'E'){
		document.getElementById("Codigo").disabled = true;
		document.getElementById("Nombre").disabled = true;
		document.getElementById("Descripcion").disabled = true;
	}
  }else{
	document.getElementById("Mensaje").innerHTML = "El registro con el código '" + xmlDoc.getElementsByTagName("codigo")[0].childNodes[0].nodeValue + "' no existe";
	 }
 }else{
	document.getElementById("Mensaje").innerHTML = "Ocurrió un error al generar la consulta a la base de datos";
 }
} 
}
function GetXmlHttpObject()
 { 
 var objXMLHttp=null;
 if (window.XMLHttpRequest)
  {
  objXMLHttp=new XMLHttpRequest();
  }
 else if (window.ActiveXObject)
  {
  objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 return objXMLHttp;
}
function limpiar_campos()
{
	document.getElementById("Mensaje").innerHTML = "";
}
function cancelar()
{
	document.getElementById("Codigo").disabled = false;
	document.getElementById("Descripcion").disabled = true;
	document.getElementById("Nombre").disabled = true;	
}