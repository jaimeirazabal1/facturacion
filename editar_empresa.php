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

	if (isset($_POST['guardar'])) {
		if ($r=$empresa->editar($_POST['id'],$_POST['nombre'],$_POST['rif'])) {
			$mensaje = '<div class="alert alert-success">Empresa Editada Correctamente</div>';
		}else{
			$mensaje = '<div class="alert alert-danger">Error, no se pudo editar la empresa</div>';
		}
	}
	
	if (isset($_GET['empresa']) and !empty($_GET['empresa'])):
		$empresas = $empresa->buscar(array("id"=>$_GET['empresa']));
	endif;
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
    	<?php if (isset($mensaje)): ?>
    		<?php echo $mensaje ?>
    	<?php endif ?>
		<div class="panel panel-info">
		<div class="panel-heading">
		   
			<h4><i class='glyphicon glyphicon glyphicon-home'></i> Editar Empresa</h4>
		</div>
			<div class="panel-body" id="">
			<?php if (isset($_GET['empresa']) and !empty($_GET['empresa'])): ?>
				
				<form action="editar_empresa.php?empresa=<?php echo $_GET['empresa'] ?>" method="POST">
					<div class="form-group">
						<label for="nombre">ID:</label>
						<input type="text" name="id" readonly="readonly" value="<?php echo $empresas[0]->id ?>" class='form-control'>
					</div>				
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" value="<?php echo $empresas[0]->nombre ?>" class='form-control'>
					</div>
					<div class="form-group">
						<label for="nombre">RIF:</label>
						<input type="text" name="rif" value="<?php echo $empresas[0]->rif ?>" class='form-control'>
					</div>
					<div class="form-group">
						<input type="submit" value="Guardar" name="guardar" class='btn btn-default'>
						<a href="./empresas.php" class='btn btn-default'>Lista de Empresas</a>
					</div>
				</form>
			<?php endif ?>
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