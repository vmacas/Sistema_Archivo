<?php 
  include 'autorizacion.php';
  include 'conexion.php' 
?>
<html>
  <head>
    <title>PD v2.0</title>
    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="css/jMenu.jquery.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/general.css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="js/jMenu.jquery.js"></script>
    <script type="text/javascript" src="js/jmenu.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>
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
    <H3>Escritura > Ingresar</H3>
  </div> 
  
  <form id="frmRegistro" >
  <div>
    <label for="cboTipoDocumento">Tipo Escritura:</label></br>
    <select name="cboTipoDocumento" id="cboTipoDocumento" onchange="SeteaOtorgante()";>
      <option value="">-- Seleccione --</option>
        <?php
          //SQL obtener los tipos escritura
 		  $query = "SELECT * FROM documento GROUP BY documento ASC"; 
 		  $result = $db->query($query);
		  //Llenar datos el combobox
    	  while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    	    echo "<option value={$row["IdDocumento"]}> {$row["Documento"]} </option>";
		  } 
    	?>
    </select>
  </div>	
  <div>
    <label>Otorga:</label>	
    <table id="tbl1" border="1">
      <thead>
        <tr>
          <th>Nombre 1</th>
          <th>Nombre 2</th>
          <th>Apellido 1</th>
          <th>Apellido 2</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" id="txtOtorga" name="n1[]" class="nombre"/></td>
          <td><input type="text" name="n2[]" class="nombre"/></td>
          <td><input type="text" name="a1[]" class="apellido"/></td>
          <td><input type="text" name="a2[]" class="apellido"/></td>
          <td><input type="button" value="-" /></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5"><input type='button' value='+' id='add'></td>
        </tr>
      </tfoot>
    </table> 
  </div>
  <div>
    <label>Beneficiario:</label>	
    <table id="tbl2" border="1">
      <thead>
        <tr>
          <th>Nombre 1</th>
          <th>Nombre 2</th>
          <th>Apellido 1</th>
          <th>Apellido 2</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="n1b[]" class="nombre"/></td>
          <td><input type="text" name="n2b[]" class="nombre"/></td>
          <td><input type="text" name="a1b[]" class="apellido"/></td>
          <td><input type="text" name="a2b[]" class="apellido"/></td>
          <td><input type="button" value="-" /></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5"><input type='button' value='+' id='add2'></td>
        </tr>
      </tfoot>
    </table> 
  </div>
  <div>
    <label for="txtNumEscritura">Escritura #:</label></br>
    <input type="text" name="txtNumEscritura" id="txtNumEscritura" size="10" />
  </div>
  <div>
    <label for="txtNumFolio">Folio #:</label></br>
    <input type="text" name="txtNumFolio" id="txtNumFolio" size="10" />
  </div>
  <div>
    <label for="txtFecha">Fecha [dd/mm/aaaa]:</label></br>
    <input type="text" name="txtFecha" id="txtFecha" size="10" />
  </div>
  <div>
    <input type="submit" value="Ingresar Escritura" id="btnIngresar" />
    <input type="button" value="Nueva Escritura" id="btnNuevo" />
  </div>
  </form>
  <div id="resultado"></div>
  </body>
</html>
