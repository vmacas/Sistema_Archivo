<?php include 'conexion.php' ?>
<?php
  // variables que contendran valores del Form
  $txtNombreEscritura = $_POST['txtNombreEscritura'];
  
  // Armo string  de sentencia sql para insertar registro
  $query = "insert into documento (documento) values ('".$txtNombreEscritura."')"; 
		 
   //echo $query;
   $result = $db->query($query);
   
   if ($result)
     echo  'Se ingreso un NUEVO Tipo de Escritura'; 

  $db->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="general.css" rel="stylesheet" type="text/css" />
</head>

<body>
</body>
</html>