<?php 
  include 'autorizacion.php'
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>PD v2.0</title>
  <!-- CSS file -->
  <link rel="stylesheet" type="text/css" href="css/jMenu.jquery.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/general.css" media="screen" />
  <script type="text/javascript" src="js/jquery-1.6.2.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
  <script type="text/javascript" src="js/jMenu.jquery.js"></script>
  <script type="text/javascript" src="js/jmenu.js"></script>  
  <script type="text/javascript" src="js/frmBuscarI.js"></script>
</head>
<body>
  <div id="cabecera">
    <h4 id="texto_cabecera">Protocolo Digital v2.0 | Notaría Segunda del Cantón Durán | Usuario: <?php echo $_SESSION['usuario'] ?> </h4>
  </div>	
  <div id="menu">
    <ul id="jMenu">
      <li><a class="fNiv">Escritura</a>
	    <ul>
	      <li class="arrow"></li>	
		  <li><a href="ingresar_escritura.php">Ingresar</a></li>
		  <li><a href="filtrar_registros.php">Actualizar</a></li>
	    </ul>
      </li>
      
      <li><a class="fNiv">Búsqueda</a>
	    <ul>
	       <li class="arrow"></li>	
		  <li><a href="buscar_interviniente.php" >Por Internivientes</a></li>
        </ul>
      </li>
      <li><a class="fNiv">Estadísticas</a>
	    <ul>
	      <li class="arrow"></li>
		  <li><a href="#">Escrituras por año</a></li>
	    </ul>
      </li>
      <li><a class="fNiv">Mantenimiento</a>
	    <ul>
	      <li class="arrow"></li>
		  <li><a href="#">Nueva Escritura</a></li>
		  <li><a href="#">Definir Tomo</a></li>
	    </ul>
      </li>
    </ul>
  </div>
  <div>
  	<h3>Búsqueda > Por Internivientes</h3>  	
  </div>
  <fieldset><legend>Seleccionar Filtros</legend>	
	<form name="frmBuscarI" id="frmBuscarI">
	<div>
	  <label for="cboAno">Año:</label>
	  <select name="cboAno" id="cboAno">
	  	<option value="">--Seleccione--</option>
	    <option>2008</option>
	    <option>2009</option>
	    <option>2010</option>
	    <option>2011</option>
	    <option>2012</option>
	    <option>2013</option>
	  </select>
	</div>
	<div>
	  <label for="cboMes">Mes:</label>
	  <select name="cboMes" id="cboMes">
	  	<option value="">--Seleccione--</option>
	    <option value="1">Enero</option>
	    <option value="2">Febrero</option>
	    <option value="3">Marzo</option>
	    <option value="4">Abril</option>
	    <option value="5">Mayo</option>
	    <option value="6">Junio</option>
	    <option value="7">Julio</option>
	    <option value="8">Agosto</option>
	    <option value="9">Septiembre</option>
	    <option value="10">Octubre</option>
	    <option value="11">Noviembre</option>
	    <option value="12">Diciembre</option>
	    <option value="13">Todos los meses</option>	    
	  </select>
	</div>
	<div>
	  <label for="cboInterviniente">Interviniente:</label>
	  <select name="cboInterviniente" id="cboInterviniente">
	  	<option value="">--Seleccione--</option>
	    <option value="1">Otorgante</option>
	    <option value="2">Beneficiario</option>	    	    
	  </select>
	</div>
	<div>
	  <label for="txtNombre1">Nombres:</label>
	  <input type="text" name="txtNombre1" id="txtNombre1"  class="nombre" size="50"/>
	</div>	
	    <div>
	      <input name="btnBuscar" type="submit" value="Buscar en el Protocolo"/>
	    </div>	
	  </form>
	</fieldset>
    <div id="resultado"></div>
  </div>
</body>
</html>
