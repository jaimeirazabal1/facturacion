<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	$active_configuracion="active";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | ";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>

  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				
				
			</div>
			<h4><i class='glyphicon glyphicon-equalizer'></i> Configuraci&oacute;n</h4>
		</div>
			<div class="panel-body">
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nombre">Nombre de Empresa:</label>
						<input type="text" class="form-control" name="nombre_empresa">
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="impuestos">
								<div class="panel panel-info">
								  <div class="panel-heading">Panel de Impuestos</div>
								  <div class="panel-body">
								    
								  </div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<input type="submit" value="Guardar" class="btn btn-success">
					</div>
				</form>
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/facturas.js"></script>
  </body>
</html>