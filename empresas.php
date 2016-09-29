<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	$active_empresas="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | ";

		/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	require_once ("classes/empresa.php");
	$empresa = new Empresa($con);
	$empresas = $empresa->consultar();
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
	<link rel="stylesheet" href="libraries/DataTables-1.10.12/media/css/dataTables.bootstrap.min.css">
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				
				<a href="#" data-toggle="modal" data-target="#myModal" id="boton_agregar_empresas" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Empresa</a>
				
			</div>
			<h4><i class='glyphicon glyphicon-equalizer'></i> Empresas</h4>
		</div>
			<div class="panel-body" id="div_empresas">
			
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="libraries/DataTables-1.10.12/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="libraries/DataTables-1.10.12/media/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/nueva_empresa.js"></script>
	<?php require_once ("modal/nueva_empresa.php"); ?>
  </body>
</html>