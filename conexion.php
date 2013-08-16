<?php
   // Parametros de conexion con base de datos MySQL
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $base = 'archivo2';
   @ $db = new mysqli($host, $user, $pass, $base);
   
   if ($db -> connect_errno){
      echo 'Error: No se pudo conectar con la base de datos.';
      exit();
   }
?>