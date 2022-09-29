<?php
require_once '../library/Conexion.php';
require_once '../models/Reparacion.clase.php';
require_once '../models/Equipo.clase.php';

class ReparacionDAO{

    public static function setRegistrarReparacion($r){//recibe objeto de tipo Reparacion
        $x=new Conexion();
        try {
            $cn=$x->getConexion();

            $sql="INSERT INTO REPARACION VALUES (:a, :b, GETDATE(), :c)";
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $r->getDescripcion(), PDO::PARAM_STR);
            $pst->bindValue(':b', $r->getCosto(), PDO::PARAM_STR);
            $pst->bindValue(':c', $r->getEquipo()->getId(), PDO::PARAM_INT);
            $pst->execute();
            $num=$pst->rowCount();
            return $num;

        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Reparacion.dao.php - METODO-> setRegistrarReparacion(); <br>';
            echo $e->getMessage();
            
        } finally {
            $x->cerrarConexion();
        }
    }
    public static function getListaReparacion($id_equipo){
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
                $sql='SELECT ID_REPARACION, DESCRIPCION, COSTO, FECHA FROM REPARACION
                      WHERE ID_EQUIPO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_equipo);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
    
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Reparacion.dao.php - METODO-> getListaReparacion(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
    public static function getListaReparacionDetalladoPc($id_orden_trabajo){
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
                $sql="SELECT E.ID_EQUIPO, MC.NOMBRE AS CASEX, CO.NOMBRE AS COLOR ,RE.DESCRIPCION AS REPARACION, RE.COSTO FROM EQUIPO E
                      INNER JOIN ORDEN_TRABAJO O ON O.ID_ORDEN_TRABAJO=E.ID_ORDEN_TRABAJO
                      INNER JOIN REPARACION RE ON RE.ID_EQUIPO=E.ID_EQUIPO
                      INNER JOIN PC P ON P.ID_EQUIPO=E.ID_EQUIPO
                      INNER JOIN CASEX CA ON CA.ID_PC=P.ID_PC
                      INNER JOIN MARCA_CASE MC ON MC.ID_MARCA_CASE=CA.ID_MARCA_CASE
                      INNER JOIN COLOR CO ON CO.ID_COLOR=CA.ID_COLOR
                      WHERE O.ID_ORDEN_TRABAJO=:a AND E.ESTADO='1'";
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_orden_trabajo, PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Reparacion.dao.php - METODO-> getListaReparacionDetalladoPc(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
    public static function getListaReparacionDetalladoLaptop($id_orden_trabajo){
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
                $sql="SELECT E.ID_EQUIPO, ML.NOMBRE AS MARCA, CO.NOMBRE AS COLOR, RE.DESCRIPCION AS REPARACION, RE.COSTO FROM EQUIPO E
                INNER JOIN ORDEN_TRABAJO O ON O.ID_ORDEN_TRABAJO=E.ID_ORDEN_TRABAJO
                INNER JOIN REPARACION RE ON RE.ID_EQUIPO=E.ID_EQUIPO
                INNER JOIN LAPTOP LA ON LA.ID_EQUIPO=E.ID_EQUIPO
                INNER JOIN MARCA_LAPTOP ML ON ML.ID_MARCA_LAPTOP=LA.ID_MARCA_LAPTOP
                INNER JOIN COLOR CO ON CO.ID_COLOR=LA.ID_COLOR
                WHERE O.ID_ORDEN_TRABAJO=:a AND E.ESTADO='1'";
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_orden_trabajo, PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Reparacion.dao.php - METODO-> getListaReparacionDetalladoLaptop(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }
    public static function getMontoTotalReparacionesXidOrdenTrabajo($id_orden_trabajo){
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
                $sql="SELECT SUM(RE.COSTO) AS TOTAL FROM REPARACION RE
                      INNER JOIN EQUIPO E ON E.ID_EQUIPO=RE.ID_EQUIPO
                      INNER JOIN ORDEN_TRABAJO O ON O.ID_ORDEN_TRABAJO=E.ID_ORDEN_TRABAJO
                      WHERE E.ESTADO='1' AND O.ID_ORDEN_TRABAJO=:a";
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a', $id_orden_trabajo, PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetch(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> Reparacion.dao.php - METODO-> getMontoTotalReparacionesXidOrdenTrabajo(); <br>';
            echo $e->getMessage();
        } finally {
            $x->cerrarConexion();
        }
    }   
}

?>