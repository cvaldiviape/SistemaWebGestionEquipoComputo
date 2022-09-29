<?php
require '../library/Parametros.php';
class Conexion{
    private $host=HOST;
    private $usuario=USUARIO;
    private $pass=PASSWORD;
    private $base_datos=DATABASE;
    private $conexion;

    public function __construct(){
        try {
            $dsn='sqlsrv:server=' . $this->host . ';database=' . $this->base_datos;//SQL SERVER
            //$dsn='mysql:host=' . $this->host . ';dbname=' . $this->base_datos;   //MYSQL SERVER
            $this->conexion=new PDO($dsn, $this->usuario, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo 'Error de conexion a la base de datos: ' . $e->getMessage() . '<br>';
            echo $e->getLine();
        }
    }
    public function getConexion(){
        return $this->conexion;
    }
    public function cerrarConexion(){
        $this->conexion=null;
    }
}
?>