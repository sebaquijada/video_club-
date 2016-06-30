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
<a href="mantenedor_pelicula.php">Mantenedor Pelicula</a>
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
<h6>99&nbsp; </h6>
</div></a>
</div> 
 
<div class="large-8 columns">
<div class="row">
<div class="medium-6 medium-centered large-4 large-centered columns">

    <form action="#" method="post" >
      <div class="row column log-in-form">
        <h4 class="text-center">Mantenedor de pelicula</h4>
         <label>NOMBRE PELICULA
          <input  id="NOM_PELICULA" name="NOM_PELICULA" type="text" VALUE="IROMAN" onchange="nom_peli_js(this.value);">
          <input type="hidden"  name="COD_PELICULA_H" id="COD_PELICULA_H" value="">
        </label>
        <select id="tipo_pelicula" name="tipo_pelicula">
			<option value="1">ACCION</option>
			<option value="2">ANIMACION</option>
			<option value="3">AVENTURAS</option>
			<option value="4">CIENCIA FICCION</option>
		</select>
        <label>CANTIDAD
          <input  id="CANT_PELICULA" name="CANT_PELICULA" type="text" value='' placeholder="10" >
        </label>
        <label>PAGO
          <input  id="PAGO" name="PAGO" type="text" value='3.000' readonly>
        </label>
        <p><input type="submit" name="b_ingresar" id="b_ingresar" value="INGRESAR" class="button expanded" >
        <input type="submit" name="b_actualizar" id="b_actualizar" value="Actualizar" class="button expanded" style="display:none">
        <input type="submit" name="b_eliminar" id="b_eliminar" value="Eliminar" class="button expanded" style="display:none"></p>
      </div>
    </form>
    <?php
	require_once("class_database.php");
	if ( isset($_REQUEST['b_ingresar'])){
		$K_TIPO_BD = 'mssql';
		$K_SERVER = '192.168.2.105';
		$K_BD = 'VIDEOCLUB';
		$K_USER = 'sa';
		$K_PASS = 'ctrl';
		$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
		
		$NOM_PELICULA = $_REQUEST['NOM_PELICULA'];
		$tipo_pelicula = $_REQUEST['tipo_pelicula'];
		$CANT_PELICULA = $_REQUEST['CANT_PELICULA'];
		
		$sql = "insert MAN_PELICULA (COD_TIPO_PELICULA
									,NOM_PELICULA
									,CANT_PELICULA)
				values($tipo_pelicula
						,'$NOM_PELICULA'
						,$CANT_PELICULA) ";
						
		//echo $sql;							
		$dbc->query($sql);
	}
	if ( isset($_REQUEST['b_actualizar'])){
		$K_TIPO_BD = 'mssql';
		$K_SERVER = '192.168.2.105';
		$K_BD = 'VIDEOCLUB';
		$K_USER = 'sa';
		$K_PASS = 'ctrl';
		$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);

		$COD_PELICULA_H = $_REQUEST['COD_PELICULA_H'];
		$tipo_pelicula = $_REQUEST['tipo_pelicula'];
		$CANT_PELICULA = $_REQUEST['CANT_PELICULA'];
			
		$sql = "UPDATE MAN_PELICULA 
				set COD_TIPO_PELICULA = $tipo_pelicula
					,CANT_PELICULA = $CANT_PELICULA
				where cod_MAN_PELICULA = $COD_PELICULA_H";
		//echo $sql;							
		$dbc->query($sql);
	}
	if ( isset($_REQUEST['b_eliminar'])){
		$K_TIPO_BD = 'mssql';
		$K_SERVER = '192.168.2.105';
		$K_BD = 'VIDEOCLUB';
		$K_USER = 'sa';
		$K_PASS = 'ctrl';
		$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
		
		$COD_PELICULA_H = $_REQUEST['COD_PELICULA_H'];
		
		$sql = "DELETE MAN_PELICULA 
				where cod_usuario = $COD_PELICULA_H";
		//echo $sql;							
		$dbc->query($sql);
	}
	?>		
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
    <script type="text/javascript" >

function nuevoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
		}
	}
 
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
 
	return xmlhttp;
}
function nom_peli_js(ve_control){
	var ajax = nuevoAjax();
	ajax.open("GET", "ajax_existe_man_pelicula.php?nom_pelicula="+ve_control, false);
	ajax.send(null);
	var resp 	= ajax.responseText;
	if(resp != 'NADA'){
    	var lista 	= resp.split('|');
    	
    	document.getElementById('COD_PELICULA_H').value = lista[0];
    	document.getElementById('NOM_PELICULA').value = lista[1];
		document.getElementById('CANT_PELICULA').value = lista[2];
		document.getElementById('tipo_pelicula').selectedIndex = lista[3];
		
		document.getElementById('b_actualizar').style.display ='';
		document.getElementById('b_eliminar').style.display ='';
    	
    }else{
    	document.getElementById('b_actualizar').style.display ='none';
		document.getElementById('b_eliminar').style.display ='none';
		
    }	
}	
</script>
</body>
</html>