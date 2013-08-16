<?php
  include 'conexion.php';
  // Valores del From
  $cboAno = $_POST['cboAno'];
  $cboMes = $_POST['cboMes'];
  $cboInterviniente = $_POST['cboInterviniente'];
  $txtNombre1 = $_POST['txtNombre1'];
?>
<html>
<head>
  <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>PD v2.0</title>
  <link href="css/general.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
  $interviniente="";
  
  $nombre = explode(" ", $txtNombre1);
  for ($i=0; $i<count($nombre); $i++){
  	$nombre[$i]= "+".$nombre[$i]." ";
	$interviniente = $interviniente.$nombre[$i];  
  };
  
  if ($cboInterviniente == 1) {
  	$tabla = "otorgante";
  } else {
  	$tabla = "beneficiario";
  };
  
   if ($cboMes == 13) {
  	 $query = "SELECT d.documento, 
                   GROUP_CONCAT(DISTINCT c.completo separator '; ') as otorgante,
                   GROUP_CONCAT(DISTINCT b.completo separator '; ') as beneficiario,
                   a.numeroescritura, 
                   a.numerofolio, 
                   a.fecha 
               FROM registro a, beneficiario b, otorgante c, documento d
               WHERE a.idregistro = b.idregistro
               AND   a.idregistro = c.idregistro
               AND   a.iddocumento = d.iddocumento
               AND   YEAR(a.fecha) = '".$cboAno."'
               AND a.idregistro in (select idregistro from $tabla where MATCH (completo) AGAINST ('".$interviniente."' IN BOOLEAN MODE) )
               group by b.idregistro
               ORDER BY a.fecha; "; 
  } else {
  	 $query = "SELECT d.documento, 
                   GROUP_CONCAT(DISTINCT c.completo separator '; ') as otorgante,
                   GROUP_CONCAT(DISTINCT b.completo separator '; ') as beneficiario,
                   a.numeroescritura, 
                   a.numerofolio, 
                   a.fecha 
	            FROM registro a, beneficiario b, otorgante c, documento d
	            WHERE a.idregistro = b.idregistro
	            AND   a.idregistro = c.idregistro
	            AND   a.iddocumento = d.iddocumento
	            AND   YEAR(a.fecha) = '".$cboAno."'
	            AND   MONTH(a.fecha)= '".$cboMes."'
	            AND a.idregistro in (select idregistro from $tabla where MATCH (completo) AGAINST ('".$interviniente."' IN BOOLEAN MODE) )
	            group by b.idregistro
				ORDER BY a.fecha; "; 
  };
  
             
  //echo $query; 
      
  $result = $db->query($query);
   $numero_filas = $result->num_rows;
   if ($numero_filas>=1){
   		echo '<table border="1" cellspacing="0" >';
	    echo '<thead>';
    	echo '<tr>';
		echo '<th>Documento</th>';
		echo '<th>Otorgante</th>';
    	echo '<th>Beneficiario</th>';
    	echo '<th>Escritura #</th>';
    	echo '<th>Folio #</th>';
    	echo '<th>Fecha</th>';
		echo '</tr>';
		echo '</thead>';
        echo '<tbody>';
		while($row = $result->fetch_array(MYSQLI_NUM)){
        echo "<tr>
           	  <td>$row[0]</td>
		      <td>$row[1]</td>
		      <td>$row[2]</td>
		      <td>$row[3]</td>
		      <td>$row[4]</td>
		      <td>$row[5]</td>
             </tr>";
        }
        echo '</tbody>';
   		$db->close();    	
   } else {
   	    echo '<span>No existen datos con los criterios seleccionados</span>';
   }
?>
</body>
</html>