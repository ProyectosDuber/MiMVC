<?php

require_once (__DIR__.'/../modelos/clPersona.php');

if(!empty($_GET['action'])){
	usuarios_controller::main($_GET['action']);
}

class usuarios_controller{
	
	static function main($action){
		if ($action == "crear"){
			usuarios_controller::crear();
		}else if ($action == "editar"){
			usuarios_controller::editar();
		}else if ($action == "buscarID"){
			usuarios_controller::buscarID(1);
		}
	}
	
	static public function crear (){
		try {
                   if(  $_POST['cedula'] ==null){
                       header("Location: ../vista/pages/frmNewUser.php?respuesta=Incompleto");
                   }else{
                    
                    
			$arrayUser = array();
			$arrayUser['cedula'] = $_POST['cedula'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
                        $arrayUser['sexo'] = $_POST['sexo'];
			$arrayUser['fechaDeNacimiento'] = $_POST['fechaDeNacimiento'];
                        $arrayUser['telefono'] = $_POST['telefono'];
                        $arrayUser['email'] = $_POST['email'];
                        $arrayUser['direccion'] = $_POST['direccion'];
			
			$usuario = new clPersona ($arrayUser);
                        echo $usuario->getDireccion();
			$usuario->insertar();
                        header("Location: ../vista/pages/frmNewUser.php?respuesta=correcto");
                   }
			
		} catch (Exception $e) {
			header("Location: ../vista/pages/frmNewUser.php?respuesta=error");
		}
	}
	
	static public function editar (){
		try {
			
			$arrayUser = array();
			$arrayUser['cedula'] = $_POST['cedula'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
                        $arrayUser['sexo'] = $_POST['sexo'];
			$arrayUser['fechaDeNacimiento'] = $_POST['fechaDeNacimiento'];
                        $arrayUser['telefono'] = $_POST['telefono'];
                        $arrayUser['email'] = $_POST['email'];
                        $arrayUser['direccion'] = $_POST['direccion'];
			
			$usuario = new clPersona ($arrayUser);
			$usuario->editar();
			header("Location: ../frmNewUser.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../frmNewUser.php?respuesta=error");
		}
	}
	
	static public function buscarID ($id){
		try { 
			return usuarios::buscarForId($id);
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
	public function buscarAll (){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}

	public function buscar ($campo, $parametro){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
}
?>