<?php
class Cliente{
    private $id;
    private $nombre;
    private $apellido;
    private $celular;
    private $lista_equipo1;
    private $lista_pago1;
    private $lista_ordenTrabajo1;

    public function __construct(){
        $this->lista_equipo1= array();
        $this->lista_pago1= array();
        $this->lista_ordenTrabajo1= array();
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setCelular($celular){
        $this->celular=$celular;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function setListaEquipo($x){
        array_push($this->lista_equipo1, $x);
    }
    public function getListaEquipo(){
        return $this->lista_equipo1;
    }
    public function setListaPago($x){
        array_push($this->lista_pago1, $x);
    }
    public function getListaPago(){
        return $this->lista_pago1;
    }
    public function setListaOrdenTrabajo($x){
        array_push($this->lista_ordenTrabajo1, $x);
    }
    public function getListaOrdenTrabajo(){
        return $this->lista_ordenTrabajo1;
    }
}

?>