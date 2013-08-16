/**
 * @author vma
 */

function buscar_intervientes(){
	//Parametros
 	var anio = document.getElementById("cboAno").value;
 	
 	var nombre1 = document.getElementById("txtNombre1").value;
 	var nombre2 = document.getElementById("txtNombre2").value;
 	
	var url = "procesar_buscar_nombre.php?anio="+anio+"&nombre1="+nombre1+"&nombre2="+nombre2;
	//alert (url);
	var ai	= new AJAXInteraction(url,resultado_ajax,"TEXT");
	ai.doGet();
}

function resultado_ajax(resultado){
	var contenedor = document.getElementById("resultados");
	contenedor.innerHTML = resultado;
}

 function mostrar_ingresos(){
   //Parametros
   var fecha_i = document.getElementById("fechai").value;
   var fecha_f = document.getElementById("fechai").value;
   var url = "procesar_buscar_ingresos.php?fecha_i="+fecha_i+"&fecha_f="+fecha_f+"&usuario="+usuario;
   var ai	= new AJAXInteraction(url,resultado_ingresos,"TEXT");
	ai.doGet();
 }
 
 function resultado_ingresos(resultado){
   var contenedor = document.getElementById("resultados");
   contenedor.innerHTML = resultado;
 }