<?php
require_once '../library/Conexion.php';
require_once '../models/Empleado.clase.php';
class EmpleadoDAO{

    public static function setIniciarSesion($Empleado){//recibe un objeto de tipo empleado
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            //$cn->beginTransaction();

            $sql="SELECT U.ID_USUARIO, EM.ID_EMPLEADO, EM.NOMBRE, EM.APELLIDO_P, EM.APELLIDO_M FROM EMPLEADO EM
                  INNER JOIN USUARIO U ON U.ID_USUARIO=EM.ID_USUARIO
                  INNER JOIN CARGO CA ON CA.ID_CARGO=EM.ID_CARGO
                  WHERE U.USERNAME=:a AND U.PASS=:b AND CA.NOMBRE=:c";
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$Empleado->getUsername(), PDO::PARAM_STR);
            $pst->bindValue(':b',$Empleado->getPass(),PDO::PARAM_STR);
            $pst->bindValue(':c',$Empleado->getCargo(),PDO::PARAM_STR);

            $pst->execute();
            return $pst;
            //$cn->commit();
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Empleado.dao.php - METODO-> setIniciarSesion(); <br>';
            echo $e->getMessage();
            //$cn->rollBack();
        } finally{
           $x->cerrarConexion();
        }
    }
}

