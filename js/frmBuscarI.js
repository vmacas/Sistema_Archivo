/**
 * @author VMA
 */
$(document).ready(function(){
  
    	
  $("#frmBuscarI").validate({
    rules: {
      cboAno:	   {required: true },
      cboMes: {required: true },
      cboInterviniente: {required: true },
      txtNombre1:  {required: true }
      
    },
    messages: {
      cboAno: "Seleccione un año",
      cboMes: "Seleccione un mes",
      cboInterviniente: "Seleccione un interviniente",
      txtNombre1:     "Ingrese un nombre"
      
    },
    submitHandler: function() {
      var queryString =  $('#frmBuscarI').serialize();
      $.ajax({
        type : "POST",
		url  : "procesar_buscar_interviniente.php",
		data : queryString,
		dataType: "html",
		success: function(data) {  
                   $('#resultado').html(data);  
                 }
              
	  });
    }
  });

});
	
