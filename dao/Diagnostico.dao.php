<?php
require_once '../library/Conexion.php';
require_once '../models/Diagnostico.clase.php';
require_once '../models/Equipo.clase.php';

class DiagnosticoDAO{

    public static function setRegistrarDiagnostico($d){//recibe objeto de tipo diagnostico
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $cn->beginTransaction();

            $sql='INSERT INTO DIAGNOSTICO VALUES (:a, GETDATE(), :b)';

            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $d->getDescripcion(), PDO::PARAM_STR);
            $pst->bindValue(':b', $d->getEquipo()->getId(), PDO::PARAM_INT);
            $pst->execute();

            $cn->commit();

            $num=$pst->rowCount();
            
            return $num;
            
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Diagnostico.dao.php - METODO-> setRegistrarDiagnostico(); <br>';
            echo $e->getMessage();
            $cn->rollBack();
        } finally {
            $x->cerrarConexion();
        }
    }
    public static function getDetalleDiagnostico($id_equipo){
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT D.DESCRIPCION, D.FECHA FROM EQUIPO E
                  INNER JOIN DIAGNOSTICO D ON D.ID_EQUIPO=E.ID_EQUIPO
                  WHERE E.ID_EQUIPO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_equipo);
            $pst->execute();

            $fila=$pst->fetch(PDO::FETCH_ASSOC);

            return $fila;
            
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Diagnostico.dao.php - METODO-> getDetalleDiagnostico(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
}

?>