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
    <script type="text/javascript" src="js/frmFiltrar.js"></script> 
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
	    </ul>
      </li>
    </ul>
  </div>
    <div>
  	  <H3>Escritura > Actualizar</H3>
    </div>
    <fieldset>
    <legend>Filtro de búsqueda</legend>
    <form id="frmFiltrar">
  	  <h5>Registros ingresados</h5>
	  <p>
        Desde:
        <input type="text" name="txtFechaI" id="txtFechaI" size="10"/><label>[dd/mm/aaaa]</label>
        Hasta:
        <input type="text" name="txtFechaF" id="txtFechaF" size="10"/><label>[dd/mm/aaaa]</label>
      </p>
      <div>
      	<input type="submit" id="btnBuscar"  value="Buscar Registros" />
	  </div>
	</form>
	</fieldset>
	<div id="resultado"></div>
  </body>
</html>
