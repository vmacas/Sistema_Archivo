/**
 * @author vma
 */

function SoloNumero(e) {     
			//asignamos el valor de la tecla a keynum
			// Solo para IE; tecla la reconocecom keyCode; resto browser which
			if(document.all){
				keynum = e.keyCode;
			}else{
				keynum = e.which;
			}
			// comprobamos si se encuentra en el rango 
			// FUENTE: developer.mozilla.org/en/DOM/Event/UIEvent/KeyEvent
			// Codigo 48 a 57: [0-9]
			// Codigo 8: backspace
			// Codigo 46: delete
			if( keynum>=48 && keynum<=57 || keynum==8 || keynum==46){
			     return true;
			}else{
			     return false;
			}
			
		}
		
function esFechaValida(fecha){
          	if (fecha != undefined && fecha.value != "" ){
		       if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){
			      //alert("Formato de fecha no valido (dd/mm/aaaa)");
			      document.getElementById("error7").innerHTML=" * Formato incorrecto";
			      return false;
		       } else {
		       	  document.getElementById("error7").innerHTML="";
		       }
		       
			var dia  =  parseInt(fecha.value.substring(0,2),10);
			var mes  =  parseInt(fecha.value.substring(3,5),10);
			var anio =  parseInt(fecha.value.substring(6),10);
			switch(mes){
				case 1:
				case 3:
				case 5:
				case 7:
				case 8:
				case 10:
				case 12:
					numDias=31;
					break;
				case 4: case 6: case 9: case 11:
					numDias=30;
					break;
				case 2:
					if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
					break;
				default:
				    document.getElementById("error7").innerHTML=" * Fecha incorrecta";
					//alert("Fecha2 introducida erronea");
					return false;
			}
			if (dia>numDias || dia==0){
				 document.getElementById("error7").innerHTML=" * Fecha incorrecta";
				//alert("Fecha3 introducida erronea");
				return false;
			} else{
				document.getElementById("error7").innerHTML="";
			}
			return true;
	       }
       }
	   
	   function comprobarSiBisisesto(anio){
			if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
				return true;
				}
			else {
				return false;
				}
		}
		
function SeteaOtorgante(){
	var valor = document.getElementById("cboTipoDocumento").value;
	var combo = document.getElementById("cboTipoDocumento");
	var sel = combo.options[combo.selectedIndex].text;
	
	if ( valor=="20" || valor=="48" || valor=="49" || valor=="26" || valor=="23" || valor=="37" || valor=="68" || valor=="44" ){
	    document.getElementById("txtNombre1").value = "ESTA NOTARIA";
    }
	document.getElementById("txtNombreE").value = sel;
}

