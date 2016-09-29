
<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/	
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

	require_once ("../classes/empresa.php");//Contiene funcion que conecta a la base de datos

	$empresa = new Empresa($con);
	$empresas = $empresa->consultar($con);
	if (isset($_GET['datatable'])) {
		?>
		<table class="table datatable">
			<thead>
				<th>#</th>
				<th>Nombre</th>
				<th>RIF</th>
				<th></th>
			</thead>
			<?php foreach ($empresas as $key => $value): ?>
				<tr>
					<td><?php echo $value->id ?></td>
					<td><?php echo $value->nombre ?></td>
					<td><?php echo $value->rif ?></td>
					<td width="200px">
						<div class="btn-group" role="group" aria-label="...">
							<a href='./editar_empresa.php?empresa=<?php echo $value->id ?>' id="<?php echo $value->id ?>" class="btn btn-default">Editar</a>
							<a href='#' id="<?php echo $value->id ?>" class="btn btn-default eliminar_empresa">Eliminar</a>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<script type="text/javascript">
			$('.datatable').DataTable({
				language:{
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar:",
				    "sUrl":            "",
				    "sInfoThousands":  ",",
				    "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "oAria": {
				        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				    }
				}
			});
		</script>
		<?php
	}else{
		die(json_encode($empresa->consultar($con)));
	}
	
?>