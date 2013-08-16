<?php
  include 'autorizacion.php';
  include 'conexion.php';
  
  // variables que contendran valores del Form
  $FechaI = $_POST['txtFechaI'];
  $v1 = explode("/", $FechaI);
  $FechaIm = $v1[2]."/".$v1[1]."/".$v1[0];
  
  $FechaF = $_POST['txtFechaF'];
  $v2 = explode("/", $FechaF);
  $FechaFm = $v2[2]."/".$v2[1]."/".$v2[0];
?>
<html>
  <head>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <link href="css/jquery-ui-1.10.0.custom.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.6.2.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.0.custom.js"></script>
    <script type="text/javascript" src="js/actualizar.js"></script>    
  </head>
  <body>
    <table border="1" cellspacing="0">
	  <caption>Resultados</caption>
	  <thead>
	    <tr>
	      <th>Escritura</th>
		  <th>Otorgante</th>
		  <th>Beneficiario</th>
		  <th>Escritura #</th>
		  <th>Folio #</th>
		  <th>Fecha</th>
		  <th>Opcion</th>
		</tr>
	  </thead>
	  <tbody>
	    <?php
          $usuario = $_SESSION['usuario'];
          //Sentencias sql para insertar escritura
          $query1 = "SELECT IdUsuario FROM usuario WHERE usuario='".$usuario."'";
          $result1 = $db->query($query1);
          $row1 = $result1->fetch_row();
          $idUsuario = $row1[0];	    
	    
	      $pagina="actualizar_escritura.php?";
	      //SQL para buscar registro
          $query2 = "SELECT a.IdRegistro, d.Documento, d.IdDocumento, 
                           GROUP_CONCAT(DISTINCT c.completo SEPARATOR '; ') AS Otorgante,
                           GROUP_CONCAT(DISTINCT b.completo SEPARATOR '; ') AS Beneficiario,
                           a.NumeroEscritura, a.NumeroFolio, a.Fecha
                    FROM registro a, beneficiario b, otorgante c, documento d
                    WHERE a.idregistro = b.idregistro
                    AND a.idregistro = c.idregistro
                    AND a.iddocumento = d.iddocumento
                    AND DATE_FORMAT(a.Fecha_ingreso,'%Y/%m/%d')>='".$FechaIm."' AND DATE_FORMAT(a.Fecha_ingreso,'%Y/%m/%d')<='".$FechaFm."' 
                    AND a.idusuario = $idUsuario
                    GROUP BY c.idregistro
                    ORDER BY a.Fecha_ingreso DESC";		 
	      $result2 = $db->query($query2);
	      //echo $query2;
	  
	      while($row2 = $result2->fetch_array(MYSQLI_NUM)){
	      echo "<tr>
	            <td>$row2[1]</td>
			    <td>$row2[3]</td>
			    <td>$row2[4]</td>
			    <td>$row2[5]</td>
			    <td>$row2[6]</td>
			    <td>$row2[7]</td>
			    <td><a href='".$pagina."IdRegistro=".$row2[0]."&iddocumento=".$row2[2]."&numescritura=".$row2[5]."&numfolio=".$row2[6]."&fecha=".$row2[7]."'>Actualizar</a></td></tr>";
	     }
	     $db->close();
	    ?>
	  </tbody>
    </table>
    
     
  </body>
</html>
