<?php
	require_once 'config/datebase.php';
	class promocion_model {
		
		private $db;
		private $paciente;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->paciente = array();
		}
		
		public function get_promocion()
		{
			$sql = "SELECT * FROM datos_pacient";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->paciente[] = $row;
			}
			return $this->paciente;
		}
		
		public function insertar($nombre, $apellido, $direccion, $correo, $celular,$opinion){
				
		$resultado = $this->db->query("INSERT INTO datos_pacient (name_pac,apellido_pac,corre_pac,celular_pac,opinion_pac,direccion_pac) VALUES ('$nombre', '$apellido', '$correo', '$celular', '$opinion','$direccion')");
			
			
			
		}
		
		public function modificar($id,$nombre, $apellido, $direccion, $correo, $celular,$opinion){
			
			$resultado = $this->db->query("UPDATE datos_pacient SET name_pac='$nombre', apellido_pac='$apellido', corre_pac='$correo',celular_pac='$celular',opinion_pac='$opinion',direccion_pac='$direccion' WHERE id = '$id'");			
		}
		
		public function eliminar($id){
			
			$resultado = $this->db->query("DELETE FROM datos_pacient WHERE id = '$id'");
			
		}
		
		public function get_paciente($id)
		{
			$sql = "SELECT * FROM dato_pacient WHERE id='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
	} 
?>