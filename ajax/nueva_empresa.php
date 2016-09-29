<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) {
        $errors[] = "Nombre vacío";
    } else if (!empty($_POST['nombre'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

		require_once ("../classes/empresa.php");//Contiene funcion que conecta a la base de datos

		$empresa = new Empresa($con);
		if (count($empresa->buscar(array("nombre"=>$_POST['nombre'])))) {
			?>
				<div class="alert alert-danger">
					<?php echo "El nombre de la empresa ya fue usado!" ?>
				</div>
			<?php
		}else{

			if($r = $empresa->nueva($_POST['nombre'],$_POST['rif'])){
				?>
				<div class="alert alert-success">
					La empresa ha sido creada
				</div>
				<?php
			}else{
				?>
				<div class="alert alert-danger">
					<?php echo $r ?>
				</div>
				<?php			
			}
		}
	}
?>