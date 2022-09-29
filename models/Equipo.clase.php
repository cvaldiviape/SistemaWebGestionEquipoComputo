<?php
class Equipo{
    protected $id;
    protected $motivo;
    protected $estado;
    protected $disco1;
    protected $memoria1;
    protected $cliente1;
    protected $ordenTrabajo1;
    protected $diagnostico1;
    protected $lista_reparacion1;

    public function __construct(){
        $this->lista_reparacion1= array();
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setMotivo($motivo){
        $this->motivo=$motivo;
    }
    public function getMotivo(){
        return $this->motivo;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setDisco($disco){
        $this->disco=$disco;
    }
    public function getDisco(){
        return $this->disco;
    }
    public function setMemoria($memoria){
        $this->memoria=$memoria;
    }
    public function getMemoria(){
        return $this->memoria;
    }
    public function setCliente($cliente){
        $this->cliente=$cliente;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function setOrdenTrabajo($ordenTrabajo){
        $this->ordenTrabajo=$ordenTrabajo;
    }
    public function getOrdenTrabajo(){
        return $this->ordenTrabajo;
    }
    public function setDiagnostico($diagnostico){
        $this->diagnostico=$diagnostico;
    }
    public function getDiagnostico(){
        return $this->diagnostico;
    }
    public function setListaReparacion($x){
        array_push($this->lista_reparacion1, $x);
    }
    public function getListaReparacion(){
        return $this->lista_reparacion1;
    }
}
?>