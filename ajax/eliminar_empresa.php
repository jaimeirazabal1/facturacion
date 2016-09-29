
<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/	
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

	require_once ("../classes/empresa.php");//Contiene funcion que conecta a la base de datos

	$empresa = new Empresa($con);
	if (isset($_GET['empresa']) and !empty($_GET['empresa'])) {
		die(json_encode($empresa->eliminar($_GET['empresa'])));
	}else{
		die(json_encode(false));

	}
	
	
	
?>