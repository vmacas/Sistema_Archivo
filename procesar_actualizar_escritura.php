<?php 
  include 'autorizacion.php';
  include 'conexion.php' 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<?php
  //session_start();
  // variables provienen del Form
  $txtRegistro = $_POST['txtRegistro'];
  $cboTipoDocumento = $_POST['cboTipoDocumento'];
  $txtNumEscritura = $_POST['txtNumEscritura'];
  $txtNumFolio = $_POST['txtNumFolio'];
  $txtFecha = $_POST['txtFecha'];
  // formateo fecha a [aaaa/mm/dd]
  $v = explode("/", $txtFecha);
  $txtFechaM = $v[2]."/".$v[1]."/".$v[0];
  // fecha y hora actual
  $instante = date("Y/m/d H:i:s");
  
  
  //Sentencias sql para actualizar escritura
  
  $query1 = "UPDATE registro 
             SET IdDocumento=$cboTipoDocumento,
  				 NumeroEscritura=$txtNumEscritura,
  				 NumeroFolio=$txtNumFolio,
  				 Fecha="."'$txtFechaM',"."
  				 Fecha_ingreso="."'$instante'"."
  			 WHERE IdRegistro=$txtRegistro";	
  
  $result1 = $db->query($query1);
  //echo $query1;
  
  $query2 = "DELETE FROM otorgante WHERE IdRegistro=$txtRegistro";
  $result2 = $db->query($query2);
  //echo $query2;
  
  for ($i=0; $i<count($_POST['n1']); $i++){ 
    $query3="INSERT INTO otorgante (IdRegistro, Nombre1, Nombre2, Apellido1, Apellido2) VALUES ($txtRegistro,'".strtoupper($_POST['n1'][$i])."', '".strtoupper($_POST['n2'][$i])."', '".strtoupper($_POST['a1'][$i])."', '".strtoupper($_POST['a2'][$i])."')"; 
    $result3 = $db->query($query3);
	//echo $query3;
  };
  
  $query4 = "DELETE FROM beneficiario WHERE IdRegistro=$txtRegistro";
  $result4 = $db->query($query4);
  //echo $query4;
 
  
  for ($i=0; $i<count($_POST['n1b']); $i++){ 
    $query5="INSERT INTO beneficiario (IdRegistro, Nombre1, Nombre2, Apellido1, Apellido2) VALUES ($txtRegistro,'".strtoupper($_POST['n1b'][$i])."', '".strtoupper($_POST['n2b'][$i])."', '".strtoupper($_POST['a1b'][$i])."', '".strtoupper($_POST['a2b'][$i])."')"; 
    $result5 = $db->query($query5);
    //echo $query5;
  };
  
  $db->query("CALL complementario($txtRegistro)");
  
  $db->close();
?>
</body>
</html>