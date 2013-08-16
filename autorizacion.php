<?php
  // start or continue session
  @session_start();
  if (!isset($_SESSION['logged'])) {
    echo '<p>Ud no esta autenticado en el sistema</p>';
    echo '<p>Por favor, acceda al sistema ingresando usuario y clave <a href="vm_login.php">click aqui</a></p>';
    die();
  }
?>