<?php
require_once '../library/Conexion.php';
require_once '../models/Equipo.clase.php';

class ClienteDAO{
     
    public static function getDetalleCliente($id_equipo){//recibe un datos que no es de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT CL.NOMBRE, CL.APELLIDO, CL.CELULAR FROM CLIENTE CL
                      INNER JOIN ORDEN_TRABAJO O ON O.ID_CLIENTE=CL.ID_CLIENTE
                      INNER JOIN EQUIPO E ON E.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                      WHERE ID_EQUIPO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_equipo, PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetch(PDO::FETCH_ASSOC);
            return $fila;

        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Cliente.dao.php - METODO-> getDetalleCliente(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
    public static function getDetalleClienteXidOrdenTrabajo($id_orden_trabajo){//recibe un datos que no es de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT CL.ID_CLIENTE, CL.NOMBRE, CL.APELLIDO, CL.CELULAR FROM CLIENTE CL
                      INNER JOIN ORDEN_TRABAJO O ON O.ID_CLIENTE=CL.ID_CLIENTE
                      WHERE O.ID_ORDEN_TRABAJO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_orden_trabajo, PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetch(PDO::FETCH_ASSOC);
            return $fila;

        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Cliente.dao.php - METODO-> getDetalleClienteXidOrdenTrabajo(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
}
?>