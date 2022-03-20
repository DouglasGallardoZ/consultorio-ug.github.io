<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root", "", "consultorio_ug");
			return $conexion;
			
		}
	}
?>