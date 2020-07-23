<?php
include '../config/config.php';
	class Conexion{
		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;
		public function __construct(){
			$this->servidor   = constant('HOST');
			$this->usuario    = constant('USER');
			$this->contrasena = constant('PASSWORD');
			$this->basedatos  = constant('DB');
		}
		function conectar(){
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			$this->conexion->set_charset("utf8");
		}
		function cerrar(){
			$this->conexion->close();
		}
	}
?>