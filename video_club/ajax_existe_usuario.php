<?php
$nom_usuario = $_REQUEST['nom_usuario'];
require_once("class_database.php");
$K_TIPO_BD = 'mssql';
$K_SERVER = '192.168.2.105';
$K_BD = 'VIDEOCLUB';
$K_USER = 'sa';
$K_PASS = 'ctrl';

$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
$sql ="select COD_USUARIO
		,NOM_USUARIO	
		,LOGIN	
		,PASSWORD	
		,AUTORIZA_INGRESO	
		,MAIL	
		,TELEFONO	
		,CELULAR	
		,ES_ADMIN	
		,ES_PERSONA	
		,ES_MANTENEDOR
 from USUARIO
 where NOM_USUARIO = '$nom_usuario'";
$dbc->query($sql);
$result = $dbc->get_row();
/*$vl_login = $result['LOGIN'];
$vl_cod_usuario = $result['COD_USUARIO'];
$vl_nom_usuario = $result['NOM_USUARIO'];*/
if($result <> ''){
$print = $result['COD_USUARIO'].'|'.$result['NOM_USUARIO'].'|'.$result['LOGIN'].'|'.$result['PASSWORD'].'|'.$result['AUTORIZA_INGRESO'].'|'.$result['MAIL'].'|'.$result['TELEFONO'].'|'.$result['CELULAR'].'|'.$result['ES_ADMIN'].'|'.$result['ES_PERSONA'].'|'.$result['ES_MANTENEDOR'].'|';
}else{
$print = 'NADA';
}
print $print;
?>