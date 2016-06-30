
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrate en MHS</title>
 
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
        <h4 class="text-center">Registrate en MHS</h4>
        <label>Nombre Completo
          <input id="NOM_USUARIO" name="NOM_USUARIO" type="text" placeholder="Juanito Perez" onchange="in_user_js(this.value);">
           <input type="hidden"  name="COD_USUARIO" id="COD_USUARIO" value="">
        </label>
        <label>Usuario
          <input id="LOGIN" name="LOGIN" type="text" placeholder="ADMIN">
        </label>
        <label>Contraseña
          <input id="PASSWORD" name="PASSWORD" type="password" placeholder="*****">
        </label>
		<label>Email
          <input id="MAIL" name="MAIL" type="text" placeholder="ejemplo@mhs.cl">
        </label>
        <label>Repetir Email
          <input id="MAIL_R" name="MAIL_R" onchange="validate();" type="text" placeholder="ejemplo@mhs.cl">
        </label>
		<label>telefono de contacto
          <input id="TELEFONO" name="TELEFONO" type="text" placeholder="+5627691345">
        </label>
        <label>celular de contacto
          <input id="CELULAR" name="CELULAR" type="text" placeholder="+5627691345">
        </label>
        <div style="display:none" id="solo_admin">
         <input id="show-password" name="autoriza_ingreso2" type="checkbox" onclick="autoriza_js(this.checked);">
         <label>autoriza_ingreso </label>
         <input type="hidden"  name="autoriza_ingreso" id="autoriza_ingreso" value="N">
         
         <input id="show-password" name="es_admin2" type="checkbox" onclick="es_admin_js(this.checked);" >
         <label>ES_ADMIN</label>
         <input type="hidden"  name="es_admin" id="es_admin" value="N">
         <p></p>
          <input id="show-password" name="es_persona2" type="checkbox" onclick="es_persona_js(this.checked);" >
		  <label>ES_PERSONA</label>
		  <input type="hidden"  name="es_persona" id="es_persona" value="S">
      
          <input id="show-password" type="checkbox" name="es_mantenedor2" onclick="es_mantenedor_js(this.checked);" >
         <label>ES_MANTENEDOR</label>
         <input type="hidden" name="es_mantenedor" id="es_mantenedor" value="N">
         </div>
        <p><input type="submit" name="b_ingresar" id="b_ingresar" value="Inscribirme" class="button expanded" >
        <input type="submit" name="b_actualizar" id="b_actualizar" value="Actualizar" class="button expanded" style="display:none">
        <input type="submit" name="b_eliminar" id="b_eliminar" value="Eliminar" class="button expanded" style="display:none">
		 <p><a href="index.html" type="submit" class="button expanded">Atrás</a></p>
       <!-- <p class="text-center"><a href="#">Forgot your password?</a></p>   -->
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
		
		$NOM_USUARIO = $_REQUEST['NOM_USUARIO'];
		$LOGIN = $_REQUEST['LOGIN'];
		$PASSWORD = $_REQUEST['PASSWORD'];
		$MAIL = $_REQUEST['MAIL'];
		$TELEFONO = $_REQUEST['TELEFONO'];
		$CELULAR = $_REQUEST['CELULAR'];
		$AUTORIZA_INGRESO = $_REQUEST['autoriza_ingreso'];
		$ES_ADMIN = $_REQUEST['es_admin'];
		$ES_PERSONA = $_REQUEST['es_persona'];
		$ES_MANTENEDOR = $_REQUEST['es_mantenedor'];
		
		$sql = "INSERT INTO USUARIO (NOM_USUARIO
									,LOGIN
									,PASSWORD
									,AUTORIZA_INGRESO
									,MAIL
									,TELEFONO
									,CELULAR
									,ES_ADMIN
									,ES_PERSONA
									,ES_MANTENEDOR)
								VALUES('$NOM_USUARIO'
									,'$LOGIN'
									,'$PASSWORD'
									,'$AUTORIZA_INGRESO'
									,'$MAIL'
									,'$TELEFONO'
									,'$CELULAR'
									,'$ES_ADMIN'
									,'$ES_PERSONA'
									,'$ES_MANTENEDOR'
									)";
		//echo $sql;							
		$dbc->query($sql);
		header ('Location:'."login.php");
	}
	if ( isset($_REQUEST['b_actualizar'])){
		$K_TIPO_BD = 'mssql';
		$K_SERVER = '192.168.2.105';
		$K_BD = 'VIDEOCLUB';
		$K_USER = 'sa';
		$K_PASS = 'ctrl';
		$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
		
		$COD_USUARIO = $_REQUEST['COD_USUARIO'];
		$NOM_USUARIO = $_REQUEST['NOM_USUARIO'];
		$LOGIN = $_REQUEST['LOGIN'];
		$PASSWORD = $_REQUEST['PASSWORD'];
		$MAIL = $_REQUEST['MAIL'];
		$TELEFONO = $_REQUEST['TELEFONO'];
		$CELULAR = $_REQUEST['CELULAR'];
		$AUTORIZA_INGRESO = $_REQUEST['autoriza_ingreso'];
		$ES_ADMIN = $_REQUEST['es_admin'];
		$ES_PERSONA = $_REQUEST['es_persona'];
		$ES_MANTENEDOR = $_REQUEST['es_mantenedor'];
		
		$sql = "UPDATE USUARIO 
				set NOM_USUARIO = '$NOM_USUARIO'
					,LOGIN		= '$LOGIN'
					,PASSWORD	= '$PASSWORD'
					,AUTORIZA_INGRESO = '$AUTORIZA_INGRESO'
					,MAIL		= '$MAIL'
					,TELEFONO	= '$TELEFONO'
					,CELULAR	= '$CELULAR'
					,ES_ADMIN	= '$ES_ADMIN'
					,ES_PERSONA	= '$ES_PERSONA'
					,ES_MANTENEDOR = '$ES_MANTENEDOR'
				where cod_usuario = $COD_USUARIO";
		//echo $sql;							
		$dbc->query($sql);
		header ('Location:'."login.php");
	}
	if ( isset($_REQUEST['b_eliminar'])){
		$K_TIPO_BD = 'mssql';
		$K_SERVER = '192.168.2.105';
		$K_BD = 'VIDEOCLUB';
		$K_USER = 'sa';
		$K_PASS = 'ctrl';
		$dbc   = new database($K_TIPO_BD, $K_SERVER, $K_BD, $K_USER, $K_PASS);
		
		$COD_USUARIO = $_REQUEST['COD_USUARIO'];
		
		$sql = "DELETE USUARIO 
				where cod_usuario = $COD_USUARIO";
		//echo $sql;							
		$dbc->query($sql);
		header ('Location:'."login.php");
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
  <script type="text/javascript" >
function validate(){
var vl_mail = document.getElementById('MAIL').value;
var vl_mail_r = document.getElementById('MAIL_R').value;
	if(vl_mail !=  vl_mail_r){
		document.getElementById('MAIL_R').value='';
		alert('Los correos no coinciden por favor vuelva a ingregarlo');
	}
}
function autoriza_js(ve_control){
	if(ve_control == true){
		document.getElementById('autoriza_ingreso').value='S';
	}else if(ve_control == false){
		document.getElementById('autoriza_ingreso').value='N';
	}
}
function es_admin_js(ve_control){
	if(ve_control == true){
		document.getElementById('es_admin').value='S';
	}else if(ve_control == false){
		document.getElementById('es_admin').value='N';
	}
}
function es_persona_js(ve_control){
	if(ve_control == true){
		document.getElementById('es_persona').value='S';
	}else if(ve_control == false){
		document.getElementById('es_persona').value='N';
	}	
}
function es_mantenedor_js(ve_control){
	if(ve_control == true){
		document.getElementById('es_mantenedor').value='S';
	}else if(ve_control == false){
		document.getElementById('es_mantenedor').value='N';
	}	
}
function validate2(){

}
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
function in_user_js(ve_control){
	var ajax = nuevoAjax();
	ajax.open("GET", "ajax_existe_usuario.php?nom_usuario="+ve_control, false);
	ajax.send(null);
	var resp 	= ajax.responseText;
	
    if(resp != 'NADA'){
    	var lista 	= resp.split('|');
	    	document.getElementById('COD_USUARIO').value = lista[0];
			document.getElementById('NOM_USUARIO').value = lista[1];
			document.getElementById('LOGIN').value = lista[2];
			document.getElementById('PASSWORD').value = lista[3];	
			document.getElementById('MAIL').value = lista[5];
			document.getElementById('MAIL_R').value = lista[5];
			document.getElementById('TELEFONO').value = lista[6];
			document.getElementById('CELULAR').value = lista[7];
			document.getElementById('autoriza_ingreso').value = lista[4];
			document.getElementById('es_admin').value = lista[8];
			document.getElementById('es_persona').value = lista[9];
			document.getElementById('es_mantenedor').value = lista[10];
			
			/*document.getElementsByName("animal")*/
			if (lista[4] == 'S'){
				document.getElementsByName('autoriza_ingreso2').checked = true;
			}
			if(lista[8] == 'S'){
				document.getElementsByName('es_admin2').checked = true;
			}	
			if(lista[9] == 'S'){
				document.getElementsByName('es_persona2').checked = true;
			}	
			if(lista[10] == 'S'){
				document.getElementsByName('es_mantenedor2').checked = true;
			}
			
			//document.getElementById('b_ingresar').styledisplay='';
			document.getElementById('b_actualizar').style.display ='';
			document.getElementById('b_eliminar').style.display ='';
			
			var vl_cod_usuario =  document.getElementById('COD_USUARIO').value;

			if (vl_cod_usuario == 1){
				document.getElementById('solo_admin').style.display ='';
			}else{
				document.getElementById('solo_admin').style.display = 'none';
			}
    }else{
    	document.getElementById('COD_USUARIO').value = '';
		document.getElementById('NOM_USUARIO').value = '';
		document.getElementById('LOGIN').value = '';
		document.getElementById('PASSWORD').value = '';	
		document.getElementById('MAIL').value = '';
		document.getElementById('MAIL_R').value = '';
		document.getElementById('TELEFONO').value = '';
		document.getElementById('CELULAR').value = '';
		document.getElementById('autoriza_ingreso').value = '';
		document.getElementById('es_admin').value = '';
		document.getElementById('es_persona').value = '';
		document.getElementById('es_mantenedor').value = '';
		document.getElementById('solo_admin').style.display = 'none';
		document.getElementById('b_actualizar').style.display ='none';
		document.getElementById('b_eliminar').style.display ='none';
    }
    
}

</script>
</body>
</html>
