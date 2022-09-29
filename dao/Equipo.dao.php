<?php
require_once '../library/Conexion.php';
require_once '../models/Equipo.clase.php';

class EquipoDAO{

    public static function setEstadoEquipo($e){//recibe un objeto de tipo "Equipo"
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='UPDATE EQUIPO 
                  SET ESTADO=:a
                  WHERE ID_EQUIPO=:b';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$e->getEstado(), PDO::PARAM_STR);
            $pst->bindValue(':b',$e->getId(), PDO::PARAM_INT);
            $pst->execute();

            $num=$pst->rowCount();
            return $num;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Equipo.dao.php - METODO->setEstadoEquipo() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
}
?>