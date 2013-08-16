/**
 * @author VMA
 */

$(document).ready(function(){
  	
  $("#frmLogin").validate({
    rules: {
      txtUsuario: {required: true},	
      txtClave:  {required: true }
    },
    messages: {
      txtUsuario: "Ingrese usuario",	
      txtClave:   "Ingrese una contraseña"
    }
  }); 
  
  
});

