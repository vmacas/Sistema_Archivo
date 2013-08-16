<?php 
  include 'autorizacion.php';
?>
<html>
  <head>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="css/jMenu.jquery.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/general.css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="js/frmFiltrar2.js"></script> 
    <script type="text/javascript" src="js/jMenu.jquery.js"></script>
    <script type="text/javascript" src="js/jmenu.js"></script>
      
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
		  <li><a href="filtrar_registros2.php">Corrección de información</a></li>
	    </ul>
      </li>
    </ul>
  </div>
    <div>
  	  <H3>Mantenimiento > Corrección de información</H3>
    </div>
    <fieldset>
    <legend>Filtro de búsqueda</legend>
    <form id="frmFiltrar2">
  	  <div>
      <label for="cboAno">Año:</label>
	  <select name="cboAno" id="cboAno">
	  	<option value="">--Seleccione--</option>
	    <option value"2008">2008</option>
	    <option value"2009">2009</option>
	    <!--<option>2010</option>
	    <option>2011</option>
	    <option>2012</option>
	    <option>2013</option>-->
	  </select>
	  </div>
	  <div>
	  <label for="txtEscritura">Número escritura:</label>
	  <input type="text" name="txtEscritura" id="txtEscritura" size="4" maxlength="4"/>
      </div>
      <div>
      	<input type="submit" name="btnBuscar2" id="btnBuscar2"  value="Buscar Registro" />
	  </div>
	</form>
	</fieldset>
	<div id="resultado"></div>
  </body>
</html>
