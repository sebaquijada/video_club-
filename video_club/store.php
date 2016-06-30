
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Video Club MHS</title>
 
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/foundation.min.css">
<link href='http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
<div class="row">
<div class="large-12 columns">
 
<div class="row">
<div class="large-12 columns">
<nav class="top-bar" data-topbar>
<ul class="title-area">
 
<li class="name">
<h1><a href="#">Video Club MHS</a></h1>
</li>
<li class="toggle-topbar menu-icon">
<a href="#"><span>menu</span></a>
</li>
</ul>
<section class="top-bar-section">
 <?php
require_once("class_database.php");
session_start(); 
$vl_cod_usuario = $_SESSION["COD_USUARIO"];

$K_TIPO_BD = 'mssql';
$K_SERVER = '192.168.2.105';
$K_BD = 'VIDEOCLUB';
$K_USER = 'sa';
$K_PASS = 'ctrl';
		
$user = $_REQUEST['user'];
$password = $_REQUEST['password'];
		
$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
		
$sql = "SELECT COD_USUARIO,ES_ADMIN,ES_PERSONA,ES_MANTENEDOR
				FROM USUARIO
				WHERE COD_USUARIO =$vl_cod_usuario";
$dbc->query($sql);
		$result = $dbc->get_row();
		$vl_es_admin = $result['ES_ADMIN'];
		$vl_es_persona = $result['ES_PERSONA'];
		$vl_es_mantenedor = $result['ES_MANTENEDOR'];
		
if ($vl_es_admin == 'S'){
	$displa_admin = '';
	$displa_add_user = '';
}
if ($vl_es_persona == 'S'){
	$displa_admin = 'none';
	$displa_add_user = 'none';
}
if ($vl_es_mantenedor == 'S'){
	$displa_admin = ' ';
	$displa_add_user = 'none';
}
?>
 
<ul class="right">
<li class="divider"></li>

<!-- <ul class="dropdown">
<li><label>Section Name</label></li>
<li class="has-dropdown">
<a class="" href="#">Has Dropdown, Level 1</a>
<ul class="dropdown">
<li>
<a href="#">Dropdown Options</a>
</li>
<li>
<a href="#">Dropdown Options</a>
</li>
<li>
<a href="#">Level 2</a>
</li>
<li>
<a href="#">Subdropdown Option</a>
</li>
<li>
<a href="#">Subdropdown Option</a>
</li>
<li>
<a href="#">Subdropdown Option</a>
</li>
</ul>
</li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li class="divider"></li>
<li><label>Section Name</label></li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li class="divider"></li>
<li>
<a href="#">See all →</a>
</li>
</ul>
</li>
<li class="divider"></li>-->
<li>
<a href="#">Bienvenido: <?php session_start(); PRINT $_SESSION["NOM_USUARIO"]; ?></a>
</li>
<li class="divider"></li>
<li class="divider" style="display:<?php echo $displa_admin; ?>"></li>
<li style="display:<?php echo $displa_admin; ?>"> 
<a href="devolver_pelicula.php">Devolución película</a>
</li>
<li class="divider"></li>
<li> 
<a href="arrendar_pelicula.php">Arriendo película</a>
</li>
<li class="divider" style="display:<?php echo $displa_admin; ?>"></li>
<li style="display:<?php echo $displa_admin; ?>"> 
<a href="mantenedor_pelicula.php">Agregar Pelicula</a>
</li>
<li class="divider" style="display:<?php echo $displa_admin; ?>"></li>
<li style="display:<?php echo $displa_admin; ?>"> 
<a href="registro_usuario.php">Agregar Usuario</a>
</li>
<li class="divider"></li>
<li>
<a href="index.html">Salir</a>
</li>
<li class="divider"></li>
<li class="has-dropdown">
<ul class="dropdown">
<!-- <li>
<a href="#">Dropdown Option</a>
</li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li>
<a href="#">Dropdown Option</a>
</li>
<li class="divider"></li>
<li>
<a href="#">See all →</a>
</li> -->
</ul>
</li>
</ul>
</section>
</nav> 
</div>
</div> 
<div class="row">
 
<div class="large-4 small-12 columns">
<img src="images/video_club.png">
<div class="hide-for-small panel">
<h3>Contacto</h3>
<h5 class="subheader">Video Club MHS esta ubicado en Bellavista Nº 0121. - Local I, Comuna de Santiago Centro, nuestro horario de atención es de Lunes a Viernes de 11:00 a 20:30 y Sábados de 11:00 - 16:30, nuestro teléfono de contacto es 954219017..</h5>
</div><a href="#">
<div class="panel callout radius">
<h6>99&nbsp; items in your cart</h6>
</div></a>
</div> 
 
<div class="large-8 columns">
<div class="row">
<div class="large-4 small-6 columns">
<a href="arrendar_pelicula.php?cod_pelicula=1">
<img src="images/ciudades.jpg">
<div class="panel">
<h5>Ciudades de papel</h5>
<h6 class="subheader">Cod. Pelicula # 1</h6>
</div>
</a>
</div>
<div class="large-4 small-6 columns">
<a href="arrendar_pelicula.php?cod_pelicula=2">
<img src="images/82228.jpg">
<div class="panel">
<h5>Jurassic World</h5>
<h6 class="subheader">Cod. Pelicula # 2</h6>
</div>
</a>
</div>
<div class="large-4 small-6 columns">
<a href="arrendar_pelicula.php?cod_pelicula=3">
<img src="images/82244.jpg">
<div class="panel">
<h5>American Ultra</h5>
<h6 class="subheader">Cod. Pelicula # 3</h6>
</div>
</a>
</div>
<div class="large-4 small-6 columns">
<a href="arrendar_pelicula.php?cod_pelicula=4">
<img src="images/82261.jpg">
<div class="panel">
<h5>PAN</h5>
<h6 class="subheader">Cod. Pelicula # 4</h6>
</div>
</a>
</div>
<div class="large-4 small-6 columns">
<a href="arrendar_pelicula.php?cod_pelicula=5">
<img src="images/82263.jpg">
<div class="panel">
<h5>Martian</h5>
<h6 class="subheader">Cod. Pelicula # 5</h6>
</div>
</a>
</div>
<div class="large-4 small-6 columns">
<a href="arrendar_pelicula.php?cod_pelicula=6">
<img src="images/82302.jpg">
<div class="panel">
<h5>Deadpool</h5>
<h6 class="subheader">Cod. Pelicula # 6</h6>
</div>
</a>
</div>
</div>
 
<div class="row">
<div class="large-12 columns">
<div class="panel">
<div class="row">
<div class="large-2 small-6 columns"><img src="http://placehold.it/300x300&amp;text=Site%20Owner"></div>
<div class="large-10 small-6 columns">
<strong>This Site Is Managed By</strong>
<hr>
Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum
odio ornare sagittis
</div>
</div>
</div>
</div> 
</div>
</div>
</div> 
<footer class="row">
<div class="large-12 columns">
<hr>
<div class="row">
<div class="large-6 columns">
<p>© Copyright no one at all. Go to town.</p>
</div>
<div class="large-6 columns">
<ul class="inline-list right">
<li>
<a href="#"></a>
</li>
<li>
<a href="#"></a>
</li>
<li>
<a href="#"></a>
</li>
<li>
<a href="#"></a>
</li>
</ul>
</div>
</div>
</div>
</footer> 
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation.min.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
