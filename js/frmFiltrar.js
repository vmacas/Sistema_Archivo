/**
 * @author VMA
 */
$(document).ready(function(){
  
  /*Seteo de mask a inputs*/ 
  $("#txtFechaI").mask("99/99/9999");
  $("#txtFechaF").mask("99/99/9999");
   	
  $("#frmFiltrar").validate({
    rules: {
      txtFechaI:    {required: true },
      txtFechaF:    {required: true }
    },
    messages: {
      txtFechaI:     "Ingrese una fecha",
      txtFechaF:     "Ingrese una fecha"
    },
    submitHandler: function() {
      var queryString =  $('#frmFiltrar').serialize();
      $.ajax({
        type : "POST",
		url  : "buscar_escritura.php",
		data : queryString,
		dataType: "html",
		success: function(data) {  
                   $('#resultado').html(data);  
                 }
              
	  });
    }
  });

});
	
