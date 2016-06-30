
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>VIDEO CLUB</title>
 
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/foundation.min.css">
<link href='http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
<div class="row">
  <div class="medium-6 medium-centered large-4 large-centered columns">

    <form action="#" method="post" >
      <div class="row column log-in-form">
        <h4 class="text-center">Inicia sesión con tu cuenta</h4>
        <label>User
          <input  id="user" name="user" type="text" placeholder="Admin">
        </label>
        <label>contraseña
          <input id="password" name="password" type="password" placeholder="password">
        </label>
		
        <input type="submit" name="b_ingresar" id="b_ingresar" value="Ingresar" class="button expanded" >
        
        <p class="text-center"><a href="registro_usuario.php">¿Olvidaste tu contraseña?</a></p>
        <p class="text-center"><a href="registro_usuario.php">Registrarse</a></p>   
      </div>
    </form>
	<?php
	require_once("class_database.php");
	unset($_SESSION["NOM_USUARIO"]);
	//session_destroy();
	if ( isset($_REQUEST['b_ingresar'])){
		$K_TIPO_BD = 'mssql';
		$K_SERVER = '192.168.2.105';
		$K_BD = 'VIDEOCLUB';
		$K_USER = 'sa';
		$K_PASS = 'ctrl';
		
		$user = $_REQUEST['user'];
		$password = $_REQUEST['password'];
		
		$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
		
		$sql = "SELECT COD_USUARIO,NOM_USUARIO ,LOGIN
				FROM USUARIO
				WHERE LOGIN ='$user'";
		$dbc->query($sql);
		$result = $dbc->get_row();
		$vl_login = $result['LOGIN'];
		$vl_cod_usuario = $result['COD_USUARIO'];
		$vl_nom_usuario = $result['NOM_USUARIO'];
		
		if(($vl_login != '') && ($vl_login == $user) ){
			$sql = "SELECT PASSWORD
				FROM USUARIO
				WHERE PASSWORD ='$password'
				AND COD_USUARIO = $vl_cod_usuario";
			$dbc->query($sql);
			$result = $dbc->get_row();
			$vl_password = $result['PASSWORD'];
		
			if(($password <> '')&&($password == $vl_password)){
				session_start();
				$_SESSION["NOM_USUARIO"]=$vl_nom_usuario;
				$_SESSION["COD_USUARIO"]=$vl_cod_usuario;
				header ('Location:'."store.php");
			}
			else{
				print '<script type="text/javascript">
						alert("Contrase�a Incorrecta");
					 </script>';
			}
		}else{
			print '<script type="text/javascript">
						alert("Usuario inexistente");
					 </script>';
		}
	}
	?>
  </div>
</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
