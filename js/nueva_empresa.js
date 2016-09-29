$(document).ready(function(){
	$("body").on("submit","#guardar_empresa",function(e){
		e.preventDefault();
		$.ajax({
			url:"./ajax/nueva_empresa.php",
			type:"post",
			data:$(this).serialize(),
			success:function(r){
				$("#resultados_ajax").html(r);
				cargar_empresas("div_empresas");
				setTimeout(function(){
					$("#myModal").modal('hide');
				},1000);
			}
		})
	});
	cargar_empresas("div_empresas");
	$("body").on("click",".eliminar_empresa",function(){
		if (confirm("Esta Seguro?")) {
			var id = $(this).attr('id');
			$.ajax({
				url:'./ajax/eliminar_empresa.php?empresa='+id,
				dataType:'json',
				success:function(r){
					if (r) {
						cargar_empresas("div_empresas");
					}else{
						alert("Ocurrio un error eliminando la empresa!");
					}
				}
			})
		}
	})
	$('#boton_agregar_empresas').on('click', function (e) {
		setTimeout(function(){
			$("#nombre").focus();
		},500);
	})
});
function cargar_empresas(div_id){
	$("#"+div_id).html("<div class='text-center'><h2>Cargando...</h2></div>");
	$.ajax({
		url:'./ajax/cargar_empresas.php?datatable=1',
		dataType:'html',
		success:function(r){
			$("#"+div_id).html(r);
		}
	})
}