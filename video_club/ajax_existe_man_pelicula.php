<?php
$nom_pelicula = $_REQUEST['nom_pelicula'];
require_once("class_database.php");
$K_TIPO_BD = 'mssql';
$K_SERVER = '192.168.2.105';
$K_BD = 'VIDEOCLUB';
$K_USER = 'sa';
$K_PASS = 'ctrl';

$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
$sql ="select COD_MAN_PELICULA
			,NOM_PELICULA
			,CANT_PELICULA
			,NOM_TIPO_PELICULA 
		from dbo.MAN_PELICULA mp, TIPO_PELICULA tp
		where mp.COD_TIPO_PELICULA = tp.COD_TIPO_PELICULA
		and  NOM_PELICULA = '$nom_pelicula'";
$dbc->query($sql);
$result = $dbc->get_row();
/*$vl_login = $result['LOGIN'];
$vl_cod_usuario = $result['COD_USUARIO'];
$vl_nom_usuario = $result['NOM_USUARIO'];*/
if($result <> ''){
$print = $result['COD_MAN_PELICULA'].'|'.$result['NOM_PELICULA'].'|'.$result['CANT_PELICULA'].'|'.$result['NOM_TIPO_PELICULA'].'|';
}else{
$print = 'NADA';
}
print $print;
?>