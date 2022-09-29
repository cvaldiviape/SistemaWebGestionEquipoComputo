<?php
require_once '../library/Conexion.php';
require_once '../models/Cliente.clase..php';
require_once '../models/Empleado.clase.php';
require_once '../models/OrdenTrabajo.clase.php';
class OrdenTrabajoDAO{

    public static function getListaOrdenTrabajo(){
        $x=new Conexion();//establecemos la conexion. es necesario (require_once '../library/Conexion.php';)
        try {
            $cn=$x->getConexion();

            $sql="SELECT O.ID_ORDEN_TRABAJO AS ID_OT, C.NOMBRE, C.APELLIDO, C.CELULAR, O.FECHA, EM.NOMBRE AS TECNICO FROM ORDEN_TRABAJO O
                  INNER JOIN CLIENTE C ON C.ID_CLIENTE=O.ID_CLIENTE
                  INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
                  LEFT JOIN PAGO PA ON PA.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  WHERE PA.ID_PAGO IS NULL";
            $pst=$cn->prepare($sql);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> OrdenTrabajo.dao.php - METODO-> listaOrdenTrabajo(); <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
           $x->cerrarConexion();
        }
    }
    public static function setRegistrarOrdenTrabajo($o){//Recibe un objeto de "$o=new OrdenTrabajo();"
        $x=new Conexion();
        try {
            $cn=$x->getConexion();

            $sql1="INSERT INTO CLIENTE VALUES (UPPER(:a) ,UPPER(:b), :c)";
            $pst1=$cn->prepare($sql1);
            $pst1->bindValue(':a',$o->getCliente()->getNombre(), PDO::PARAM_STR);
            $pst1->bindValue(':b',$o->getCliente()->getApellido(), PDO::PARAM_STR);
            $pst1->bindValue(':c',$o->getCliente()->getCelular(), PDO::PARAM_STR);
            $pst1->execute();

            $id_cliente=$cn->lastInsertId();

            $sql2="INSERT INTO ORDEN_TRABAJO VALUES(GETDATE(), :d, :e)";
            $pst2=$cn->prepare($sql2);
            $pst2->bindValue(':d', $o->getEmpleado()->getId(), PDO::PARAM_INT);
            $pst2->bindValue(':e', $id_cliente, PDO::PARAM_INT);
            $pst2->execute();
            
            $id_orden_trabajo=$cn->lastInsertId();
            return $id_orden_trabajo;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->OrdenTrabajo.dao.php - METODO->setGenerarCodigoOrdenTrabajo() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function getBuscarXid($o){//Recibe un objeto de "$o=new OrdenTrabajo();"
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT O.ID_ORDEN_TRABAJO AS ID_OT,
                         C.NOMBRE, C.APELLIDO, C.CELULAR, O.FECHA, 
                         EM.NOMBRE AS NOM_TECNICO, 
                         EM.APELLIDO_P AS APEP_TECNICO,
                         EM.APELLIDO_M AS APEM_TECNICO, 
                         EM.CELULAR AS CEL_TECNICO,
                         CA.NOMBRE AS CARGO FROM ORDEN_TRABAJO O
                  INNER JOIN CLIENTE C ON C.ID_CLIENTE=O.ID_CLIENTE
                  INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
                  INNER JOIN CARGO CA ON CA.ID_CARGO=EM.ID_CARGO
                  WHERE O.ID_ORDEN_TRABAJO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$o->getId(),PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetch(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->OrdenTrabajo.dao.php - METODO->getBuscarXid() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function getListaOrdenTrabajoXtecnico($id_sesion){
        $x=new Conexion();//establecemos la conexion. es necesario (require_once '../library/Conexion.php';)
        try {
            $cn=$x->getConexion();

            $sql="SELECT O.ID_ORDEN_TRABAJO AS ID_OT, C.NOMBRE, C.APELLIDO, C.CELULAR, O.FECHA, EM.NOMBRE AS TECNICO FROM ORDEN_TRABAJO O
                  INNER JOIN CLIENTE C ON C.ID_CLIENTE=O.ID_CLIENTE
                  INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
                  LEFT JOIN PAGO PA ON PA.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  WHERE EM.ID_EMPLEADO=:a AND PA.ID_PAGO IS NULL";
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_sesion,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO-> OrdenTrabajo.dao.php - METODO-> getListaOrdenTrabajoXtecnico(); <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
           $x->cerrarConexion();
        }
    }
}
?>
