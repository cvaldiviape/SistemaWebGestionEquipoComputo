<?php
require_once '../library/Conexion.php';
require_once '../models/Pago.clase.php';

class PagoDAO{
     
    public static function setRegistrarPago($pago){//recibe un objeto de tipo "Pago".
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
                $sql='INSERT INTO PAGO VALUES (GETDATE(), :a, :b)
                ';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $pago->getTotal(), PDO::PARAM_STR);
            $pst->bindValue(':b', $pago->getOrdenTrabajo(), PDO::PARAM_INT);
            $pst->execute();
           
            $num=$pst->rowCount();
            return $num;
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> PagoDAO.dao.php - METODO-> setRegistrarPago(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
}
?>