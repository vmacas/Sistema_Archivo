/**
 * @author VMA
 */
$(document).ready(function(){
  	
  /*Seteo de mascara a textbox*/
  $("#txtNumEscritura").mask("9?9999", {placeholder:" "});
  $("#txtNumFolio").mask("9?9999", {placeholder:" "});
  $("#txtFecha").mask("99/99/9999");
  
  /* Añadir una fila mas */	
  $("#add").click(function () {
    var fila = '<tr>';   	              
    fila += '<td><input type="text" name="n1[]" class="nombre"/></td>';
    fila += '<td><input type="text" name="n2[]" class="nombre"/></td>';
    fila += '<td><input type="text" name="a1[]" class="apellido"/></td>';
    fila += '<td><input type="text" name="a2[]" class="apellido"/></td>';
    fila += '<td><input type="button" value="-"/></td>';
    fila += '</tr>';
        
    $("#tbl1").append(fila);
  });
  
  /* Eliminar una fila */  
  $("#tbl1 tbody :button").live("click", function(){
  /*if ($("#tbl1").find('tr').length==1){
   	alert('No se puede eliminar ')
  } */	
    if (!confirm('¿Desea eliminar este registro?')){
      return;
    } else { 
      var row = $(this).closest('tr');
      $(row).remove();	
      }
  });
  
  /* Añadir una fila mas */	
  $("#add2").click(function () {
    var fila = '<tr>';   	              
    fila +=  '<td><input type="text" name="n1b[]" class="nombre"/></td>';
    fila +=  '<td><input type="text" name="n2b[]" class="nombre"/></td>';
    fila +=  '<td><input type="text" name="a1b[]" class="apellido"/></td>';
    fila +=  '<td><input type="text" name="a2b[]" class="apellido"/></td>';
    fila +=  '<td><input type="button" value="-"/></td>';
    fila +=  '</tr>';
       
    $("#tbl2").append(fila);
  });
  
  /* Eliminar una fila */  
  $("#tbl2 tbody tr td :button").live("click",function(){
    if (!confirm('¿Desea eliminar este registro?')){
      return;
    } else { 
      var row = $(this).closest('tr');
      $(row).remove();
      }
  });  
  
  $("#frmRegistro").validate({
    rules: {
      cboTipoDocumento: {required: true},	
      txtNumEscritura:  {required: true },
      txtNumFolio:      {required: true },
      txtFecha:         {required: true }
    },
    messages: {
      cboTipoDocumento: "Seleccione un documento",	
      txtNumEscritura:  "Ingrese un número",
      txtNumFolio:      "Ingrese un número",
      txtFecha:         "Ingrese una fecha"
    },
    submitHandler: function() {
      var queryString =  $('#frmRegistro').serialize();
      //alert (queryString);	 
      $.ajax({
        type : "POST",
		url  : "procesar_actualizar_escritura.php",
		data : queryString,
		dataType: "html",
		success: function(data) {  
                   $('#resultado').html("Escritura actualizada correctamente");
                   $("select").attr('disabled', 'disabled');
                   $('input[type="text"]').attr('disabled','disabled');
                   $('#btnActualizar').attr('disabled','disabled');
                         
                 }                  
	  });
    }
  }); 
  
  
});
