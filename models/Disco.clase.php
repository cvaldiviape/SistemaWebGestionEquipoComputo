<?php
class Disco{
    private $id;
    private $capacidad;
    private $tipo;
    private $categoria;
    private $marca;
    private $equipo2;

    public function __construct(){
        
    }
    public function setIdDisco($id){
        $this->id=$id;
    }
    public function getIdDisco(){
        return $this->id_disco;
    }
    public function setCapacidad($capacidad){
        $this->capacidad=$capacidad;
    }
    public function getCapacidad(){
        return $this->capacidad;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setCategoria($categoria){
        $this->categoria=$categoria;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function setMarca($marca){
        $this->marca=$marca;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function setEquipo($equipo2){
        $this->equipo2=$equipo2;
    }
    public function getEquipo(){
        return $this->equipo2;
    }
}
?>