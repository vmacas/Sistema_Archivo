<?php include 'conexion.php' ?>
<?php
  // variables que contendran valores del Form
  $cboTipoDocumento = $_POST['cboTipoDocumento'];
  $txtAno = $_POST['txtAno'];
  $txtTipoDocumento = $_POST['txtTipoDocumento'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/general.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
   echo "<b>Criterios de busqueda</b>"."<br>";
   echo "<b>Año:</b> ".$txtAno."<br>";
   echo "<b>Escritura:</b> ".$txtTipoDocumento."<br>";
   echo "<br>";
   echo "<b>Resultados:</b>"."<br>";
?>
<br>
<table name="tblResultados" cellspacing="0" class="datos">
<thead>
<tr>
	<th>Cantidad</th>
	<th>Escritura</th>
</tr>	
</thead>
<tbody>
<?php
   //SQL para buscar solo por "Otorgante"
  $query = "SELECT COUNT(*), documento
            FROM registro a, documento b
	        WHERE a.iddocumento = b.iddocumento 
            AND a.iddocumento = '".$cboTipoDocumento."'
	        AND year(a.fecha) = '".$txtAno."'
	        GROUP BY documento";
			 
   //echo $query;
   $result = $db->query($query);
   while($row = $result->fetch_array(MYSQLI_NUM)){
    echo "<tr>
           <td>$row[0]</td>
		   <td>$row[1]</td>
		  </tr>";
   }
    $db->close();
?>
</tbody>
</table>
</body>
</html>