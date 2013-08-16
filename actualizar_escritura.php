<?php
  include 'autorizacion.php'; 
  include 'conexion.php' 
?>
<?php 
  $IdRegistro = $_GET['IdRegistro'];
  $iddocumento = $_GET['iddocumento'];
  $numescritura = $_GET['numescritura'];
  $numfolio = $_GET['numfolio'];
  $fecha = $_GET['fecha'];
  // formateo fecha a [dd/mm/aaaa]
  $v = explode("-", $fecha);
  $fechaM = $v[2]."/".$v[1]."/".$v[0];
  
?>

<html>
  <head>
    <title></title>
    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="css/jMenu.jquery.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/general.css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="js/frmRegistro_m.js"></script>
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
  <div><H3>Escritura > Actualizar</H3></div>
  <form id="frmRegistro" >
  <div>
  	<input type="hidden" name="txtRegistro" id="txtRegistro" value="<? echo $IdRegistro ?>" />
  </div>	
  <div>
    <label for="cboTipoDocumento">Tipo Escritura:</label></br>
    <select name="cboTipoDocumento" id="cboTipoDocumento" onchange="SeteaOtorgante();">
      <option value="">-- Seleccione --</option>
        <?php
            //SQL obtener los tipos de escritura
            $query = "SELECT * FROM documento ORDER BY documento asc"; 
            $result = $db->query($query);
    		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    			if ($row["IdDocumento"]==$iddocumento){
    				echo "<option value={$row["IdDocumento"]} selected> {$row["Documento"]} </option>";
				}else{
					echo "<option value={$row["IdDocumento"]}> {$row["Documento"]} </option>";
				}
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
        <?php 
          //SQL obtener los tipos de escritura
          $query = "SELECT nombre1, nombre2, apellido1, apellido2 FROM otorgante WHERE IdRegistro=".$IdRegistro; 
		  //echo $query;
		  $result = $db->query($query);
          while($row = $result->fetch_array(MYSQLI_NUM)) {
    	  	echo "<tr>";
    	  	echo "<td><input type='text' name='n1[]' class='nombre' value='$row[0]'/></td>";
    	  	echo "<td><input type='text' name='n2[]' class='nombre' value='$row[1]'/></td>";
			echo "<td><input type='text' name='a1[]' class='apellido' value='$row[2]'/></td>";
			echo "<td><input type='text' name='a2[]' class='apellido' value='$row[3]'/></td>";
			echo "<td><input type='button' value='-' /></td>";
            echo "</tr>";
    	  }		   
        ?>
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
       <?php 
          //SQL obtener los tipos de escritura
          $query = "SELECT nombre1, nombre2, apellido1, apellido2 FROM beneficiario WHERE IdRegistro=".$IdRegistro; 
		  //echo $query;
		  $result = $db->query($query);
          while($row = $result->fetch_array(MYSQLI_NUM)) {
    	  	echo "<tr>";
    	  	echo "<td><input type='text' name='n1b[]' class='nombre' value='$row[0]' /></td>";
    	  	echo "<td><input type='text' name='n2b[]' class='nombre' value='$row[1]'/></td>";
			echo "<td><input type='text' name='a1b[]' class='apellido' value='$row[2]'/></td>";
			echo "<td><input type='text' name='a2b[]' class='apellido' value='$row[3]'/></td>";
			echo "<td><input type='button' value='-' /></td>";
            echo "</tr>";
    	  }		   
        ?>
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
    <input type="text" name="txtNumEscritura" id="txtNumEscritura" size="10" value="<? echo $numescritura ?>"/>
  </div>
  <div>
    <label for="txtNumFolio">Folio #:</label></br>
    <input type="text" name="txtNumFolio" id="txtNumFolio" size="10" value="<? echo $numfolio ?>"/>
  </div>
  <div>
    <label for="txtFecha">Fecha [dd/mm/aaaa]:</label></br>
    <input type="text" name="txtFecha" id="txtFecha" size="10" value="<? echo $fechaM ?>"/>
  </div>
  <div>
    <input type="submit" value="Actualizar Escritura" id="btnActualizar" />
  </div>
  </form>
  <div id="resultado"></div>
  </body>
</html>
