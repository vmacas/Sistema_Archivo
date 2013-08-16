<?php
   session_start();
   include 'conexion.php';
   // filter incoming values
   $usuario = (isset($_POST['txtUsuario'])) ? trim($_POST['txtUsuario']) : '';
   $clave = (isset($_POST['txtClave'])) ? $_POST['txtClave'] : '';
   //$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'principal.php';
   $redirect = 'ingresar_escritura.php';
   
   if (isset($_POST['submit'])) {
      $query = 'SELECT * FROM usuario WHERE ' .
               'usuario = "' . $db->real_escape_string($usuario) . '" AND ' .
               'clave = PASSWORD("' . $db->real_escape_string($clave) . '")';
	  //echo $query;
      $result = $db->query($query);

     if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['logged'] = 1;
        $_SESSION['admin_level'] = $row['IdRol'];
        header ('Refresh: 0; URL=' . $redirect);
        $result->free_result();
		$db->close();
        die();
      } else {
        // set these explicitly just to make sure
        $_SESSION['usuario'] = '';
        $_SESSION['logged'] = 0;
        $_SESSION['admin_level'] = 0;

        $error = '<p><strong>Ud ha ingresaro usuario y/o clave incorrecta</strong></p> 
                  <p>Por favor, vuelva a intentar</p>';
     }
     $result->free_result();
   }
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PD v2.0</title>
    <link rel="stylesheet" type="text/css" href="css/general.css" media="screen" />
    <script src="js/jquery-1.6.2.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/frmLogin.js"></script>
  </head>
  <body>
    <?php if (isset($error)) { echo $error; } ?>  
    <h1>PROTOCOLO DIGITAL</h2>
	<h2>Notaría Segunda del Cantón Durán</h2>
	<form id="frmLogin" action="login.php" method="post">
  	  <fieldset>
        <legend>Login</legend>
          <table>
	   	    <tr>
	       	  <td>Usuario</td>
	       	  <td><input type="text" name="txtUsuario" id="txtUsuario"  size="20"/></td>
	   	    </tr>
	   	    <tr>
	   		  <td>Contraseña</td>
	   		  <td><input type="password" name="txtClave" id="txtClave" size="20"/></td>
	   	    </tr>
	   	    <tr>
	   		  <td colspan="2"><input type="submit" name="submit" value="Accesar al Sistema"/></td>
	   	    </tr>
	      </table>
	  </fieldset>
    </form>
  </body>
</html>