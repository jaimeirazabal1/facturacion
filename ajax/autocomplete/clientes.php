<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();

if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM clientes where nombre_cliente like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	
	while ($row = mysqli_fetch_array($fetch)) {
		$id_cliente=$row['id_cliente'];
		$row_array['value'] = $row['nombre_cliente'];
		$row_array['id_cliente']=$id_cliente;
		$row_array['nombre_cliente']=$row['nombre_cliente'];
		$row_array['telefono_cliente']=$row['telefono_cliente'];
		$row_array['email_cliente']=$row['email_cliente'];
		array_push($return_arr,$row_array);
    }
	
}


mysqli_close($con);


echo json_encode($return_arr);

}
?>