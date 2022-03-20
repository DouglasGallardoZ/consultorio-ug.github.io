<?php
	
	class PromocionController {
		
		public function __construct(){
			require_once "modelo/dao/promocionModel.php";
		}
		
		public function index(){
			
			
			$promocion = new promocion_model();
			$data["promocion"] = $promocion->get_promocion();
			
			require_once "vista/promocion/promocion.php";	
			
		}
		
		public function nuevo(){
			
			$data["titulo"] = "Paciente";
			require_once "vista/promocion/promocion_nuevo.php";
		}

		public function inicio(){
			$data["titulo"] = "Paciente";
			require_once "vista/promocion/promocion.php";
		}
		
		public function guarda(){
			
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$direccion = $_POST['direccion'];
			$correo = $_POST['correo'];
			$celular = $_POST['celular'];
			$opinion = $_POST['opinion'];
			$promocion = new promocion_model();
			$promocion->insertar($nombre, $apellido, $direccion, $correo, $celular,$opinion);
			$data["titulo"]="Vehiculos";
			$this->index();
			
		}
		
		public function modificar($id){
			
			$paciente = new promocion_model();
			
			$data["id"] = $id;
			$data["paciente"] = $paciente->get_paciente($id);
			$data["titulo"] = "Paciente";
			require_once "vista/promocion_modificar.php";
		}
		
		public function actualizar(){
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$direccion = $_POST['direccion'];
			$correo = $_POST['correo'];
			$celular = $_POST['celular'];
			$opinion = $_POST['opinion'];
			$paciente = new promocion_model();
			$paciente->modificar($id,$nombre, $apellido, $direccion, $correo, $celular,$opinion);
			$data["titulo"] = "Paciente";
			$this->index();
		}
		
		public function eliminar($id){
			
			$paciente = new promocion_model();
			$paciente->eliminar($id);
			$data["titulo"] = "Paciente";
			$this->index();
		}	
	}
?>