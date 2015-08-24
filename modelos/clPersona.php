<?php

require_once './db_abstract_class.php';
class clPersona extends db_abstract_class {
    private $idPersona;
    private $cedula;
    private $nombres;
    private $apellidos;
    private $sexo;
    private $fechaDeNacimiento;
    private $telefono;
    private $email;
    private $direccion;
    
    function __construct($datos = array()) {
        parent::__construct();
        
            if(count($datos) >1){
                foreach ( $datos as $columna =>$dato ){
                    $this->$columna = $dato;
                }
                
            }else{
                $this->cedula="";
                $this->nombres="";
                $this->apellidos="";
                $this->sexo="";
                $this->fechaDeNacimiento="";
                $this->telefono="";
                $this->email="";
                $this->direccion="";               
            }
        
    }
    
    function __destruct() {
        $this->Disconnect();
        
    }
            
    
    function getIdPersona() {
        return $this->idPersona;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getFechaDeNacimiento() {
        return $this->fechaDeNacimiento;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setFechaDeNacimiento($fechaDeNacimiento) {
        $this->fechaDeNacimiento = $fechaDeNacimiento;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

        










    protected function editar() {
        $query = "UPDATE Personas SET cedula=?,nombres=?,apellidos=?,sexo=?,fechaDeNacimiento=?,telefono=?,email=?,direccion=? where idPersona=?";
       $params = array(
       $this->cedula,
       $this->nombres,
       $this->apellidos,
       $this->sexo,
       $this->fechaDeNacimiento,
       $this->telefono,
       $this->email,
       $this->direccion,
       $this->idPersona
       );
        
        parent::updateRow($query, $params);
            $this->Disconnect();
    }

    protected function eliminar() {
        
    }

    protected function insertar() {
             $query = "INSERT INTO Personas VALUES('NULL',?,?,?,?,?,?,?,?)";
       $params = array(
       $this->cedula,
       $this->nombres,
       $this->apellidos,
       $this->sexo,
       $this->fechaDeNacimiento,
       $this->telefono,
       $this->email,
       $this->direccion,
      
       );
        
        parent::insertRow($query, $params);
        $this->Disconnect();
    }

    protected static function buscar($query) {
        
    }

    protected static function buscarForId($id) {
        
    }

    protected static function getAll() {
        
    }

}
