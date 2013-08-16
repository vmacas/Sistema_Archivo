<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="css/general.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery-1.6.2.js" type="text/javascript"></script>
  <script src="js/utilidades.js" type="text/javascript"></script>
  <script src="js/validacion.js" type="text/javascript"></script>
  <title></title>
  <script type="text/javascript" charset="utf-8">
$(function(){
	$('#menu li a').click(function(event){
		var elem = $(this).next();
		if(elem.is('ul')){
			event.preventDefault();
			$('#menu ul:visible').not(elem).slideUp();
			elem.slideToggle();
		}
	});
});
</script>
</head>
<body>
	<div id="contenedor">
  <div id="cabecera">
  	<h1>ARCHIVO:: v.1.9</h1>
    <h2>Notaría Segunda del Cantón Durán</h2>
    <p align="right">Usuario: <?php session_start(); echo $_SESSION['usuario']; ?></p>
  </div>
  
  <div id="menu1">
  	<ul id="menu">
      <li><a href="#">Escritura</a>
	    <ul>
		  <li><a href="registro_escrituras.php">Ingresar</a></li>
		  <li><a href="modificar_escrituras.php">Modificar</a></li>
	    </ul>
      </li>
      <li><a href="#">Búsqueda</a>
	    <ul>
		  <li><a href="buscar_nombre.php" >Por Internivientes</a></li>
          <li><a href="buscar_escritura.php">Por Tipo Escritura</a></li>
	    </ul>
      </li>
      <li><a href="#">Mantenimiento</a>
	    <ul>
		  <li><a href="nueva_escritura.php">Ingresar Nueva Escritura</a></li>
	    </ul>
      </li>
    </ul>

  </div>
  
  <div id="contenido">
  	<H3>Mantenimiento > Ingresar Nueva Escritura</H3>
	<form name="frmNuevaEscritura" id="frmNuevaEscritura" action="procesar_nueva_escritura.php" method="post">
	<table>
  	<tr>
  	  <td>Nombre Escritura:</td>
    <td><input type="text" name="txtNombreEscritura" id="txtNombreEscritura" class="ingresos" onKeyup="this.value = this.value.toUpperCase();" size="50" maxlength="60" /><span id="error1" class="error">* Ingrese un valor</span></td>
  	</tr>
  	<tr>
 	   <td colspan="2" align="center"><input name="Ingresar" type="submit" value="Ingresar" /></td>
 	 </tr>
	</table>
	</form>
  </div>
  <div id="pie"></div>
</div>
</body>
</html>
