/**
 * @author VMA
 */
$(document).ready(function(){
  
  /*Seteo de mask a inputs*/ 
  $("#txtEscritura").mask("9?9999", {placeholder:" "});
  $("#frmFiltrar2").validate({
    rules: {
      txtEscritura:    {required: true }
    },
    messages: {
      txtEscritura:     "Ingrese un número",
    },
    submitHandler: function() {
      var queryString =  $('#frmFiltrar2').serialize();
      $.ajax({
        type : "POST",
		url  : "buscar_escritura2.php",
		data : queryString,
		dataType: "html",
		success: function(data) {  
                   $('#resultado').html(data);  
                 }
              
	  });
    }
  });

});
	
