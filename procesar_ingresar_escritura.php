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
  // variables que contendran valores del Form
  $cboTipoDocumento = $_POST['cboTipoDocumento'];
  $txtNumEscritura = $_POST['txtNumEscritura'];
  $txtNumFolio = $_POST['txtNumFolio'];
  $txtFecha = $_POST['txtFecha'];
  // formateo fecha a [aaaa/mm/dd]
  $v = explode("/", $txtFecha);
  $txtFechaM = $v[2]."/".$v[1]."/".$v[0];
  // fecha y hora actual
  $instante = date("Y/m/d H:i:s");
  $usuario = $_SESSION['usuario'];
  
  //Sentencias sql para insertar escritura
  $query1 = "SELECT IdUsuario FROM usuario WHERE usuario='".$usuario."'";
  $result1 = $db->query($query1);
  $row1 = $result1->fetch_row();
  $idUsuario = $row1[0];
  echo $query1;
  
  $query2 = "INSERT INTO registro (IdUsuario, IdDocumento, NumeroEscritura, NumeroFolio, Fecha, Fecha_ingreso) VALUES('".$idUsuario."', '".$cboTipoDocumento."', '".$txtNumEscritura."', '".$txtNumFolio."', '".$txtFechaM."', '".$instante."')";
  $result2 = $db->query($query2);
  echo $query2;
  
  $query3 = "SELECT MAX(IdRegistro) FROM registro";
  $result3 = $db->query($query3);
  $row2 = $result3->fetch_row();
  
  for ($i=0; $i<count($_POST['n1']); $i++){ 
    $query4="INSERT INTO otorgante (IdRegistro, Nombre1, Nombre2, Apellido1, Apellido2) VALUES ('".$row2[0]."', '".strtoupper($_POST['n1'][$i])."', '".strtoupper($_POST['n2'][$i])."', '".strtoupper($_POST['a1'][$i])."', '".strtoupper($_POST['a2'][$i])."')"; 
    $result4 = $db->query($query4);
	echo $query4;
  };
  
  for ($i=0; $i<count($_POST['n1b']); $i++){ 
    $query5="INSERT INTO beneficiario (IdRegistro, Nombre1, Nombre2, Apellido1, Apellido2) VALUES ('".$row2[0]."', '".strtoupper($_POST['n1b'][$i])."', '".strtoupper($_POST['n2b'][$i])."', '".strtoupper($_POST['a1b'][$i])."', '".strtoupper($_POST['a2b'][$i])."')"; 
    $result5 = $db->query($query5);
    echo $query5;
  };
  
  $db->query("CALL complementario($row2[0])");
  
  $db->close();
?>
</body>
</html>