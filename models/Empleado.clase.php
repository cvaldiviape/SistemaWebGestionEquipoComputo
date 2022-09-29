<?php
require_once '../models/Usuario.clase.php';
class Empleado extends Usuario{
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $dni;
    private $celular;
    private $cargo;
    private $lista_ordenTrabajo1;

    public function __construct(){
        $this->lista_ordenTrabajo1= array();
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setApellidoP($apellido_p){
        $this->apellido_p=$apellido_p;
    }
    public function getApellidoP(){
        return $this->apellido_p;
    }
    public function setApellidoM($apellido_m){
        $this->apellido_m=$apellido_m;
    }
    public function getApellidoM(){
        return $this->apellido_m;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function getDni(){
        return $this->dni;
    }
    public function setCelular($celular){
        $this->celular=$celular;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function setCargo($cargo){
        $this->cargo=$cargo;
    }
    public function getCargo(){
        return $this->cargo;
    }
    public function setListaOrdenTrabajo($x){
        array_push($this->lista_ordenTrabajo1, $x);
    }
    public function getListaOrdenTrabajo(){
        return $this->lista_ordenTrabajo1;
    }
}
?>