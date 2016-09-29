<?php 
class Empresa{
	private $empresas;
	public function __construct($con = null){
		$this->con = $con;
		$this->empresas = array();
	}
	public function consultar(){
		$this->empresas = array();
		$q = "select * from empresa";
		$result = mysqli_query($this->con,$q);
	
		$count=mysqli_num_rows($result);
		if ($count) {
			while($row = mysqli_fetch_object($result)){
				$this->empresas[] = $row;
			}
		}
		return $this->empresas;
	}
	public function buscar($dato){
		$this->empresas = array();
		$columna = key($dato);
		$valor = $dato[$columna];
		$q = "select * from empresa where $columna = '$valor'";

		$result = mysqli_query($this->con,$q);
		$count=mysqli_num_rows($result);

		if ($count) {
			while($row = mysqli_fetch_object($result)){
				$this->empresas[] = $row;
			}
		}
		return $this->empresas;
	}
	public function nueva($nombre,$rif=null){
			
		$q = "INSERT INTO empresa (nombre,rif) values ('".$nombre."','".$rif."')";
		$result = mysqli_query($this->con,$q);

		if ($result) {
			return mysqli_insert_id($this->con);
		}else{
			return mysqli_error($this->con);
		}
		return false;
		
	}
	public function eliminar($id){
		$query = "DELETE from empresa where id='$id'";
		return mysqli_query($this->con,$query);
	}
	public function editar($id,$nombre=null,$rif=null){
		$q="UPDATE empresa set nombre='$nombre', rif='$rif' where id='$id'";
		var_dump($q);
		return mysqli_query($this->con,$q);
	}
}

 ?>