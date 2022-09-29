<?php
require_once '../library/Conexion.php';
require_once '../models/OrdenTrabajo.clase.php';
require_once '../models/Laptop.clase.php';
require_once '../models/Disco.clase.php';
require_once '../models/Memoria.clase.php';
class LaptopDAO{

    public static function getListaLaptopXidOrdenTrabajo($id_ot){//recibe un "id", no es dato de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT E.ID_EQUIPO, E.ESTADO, MA.NOMBRE AS MARCA, CO.NOMBRE AS COLOR, DI.CAPACIDAD AS DISCO, ME.CAPACIDAD AS MEMORIA, MO.DESCRIPCION AS MOTIVO FROM ORDEN_TRABAJO O
                  INNER JOIN EQUIPO E ON E.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  INNER JOIN MOTIVO MO ON MO.ID_MOTIVO=E.ID_MOTIVO
                  INNER JOIN LAPTOP LA ON LA.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN MARCA_LAPTOP MA ON MA.ID_MARCA_LAPTOP=LA.ID_MARCA_LAPTOP
                  INNER JOIN COLOR CO ON CO.ID_COLOR=LA.ID_COLOR
                  INNER JOIN DISCO DI ON DI.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN MEMORIA ME ON ME.ID_EQUIPO=E.ID_EQUIPO
                  WHERE O.ID_ORDEN_TRABAJO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_ot,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Laptop.dao.php - METODO->getListaLaptopXidOrdenTrabajo() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function setRegistrarLaptop($la){//recibe un objeto de tipo Laptop
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $cn->beginTransaction();
            /*$sql='EXEC SP_REGISTRAR_PC :id_orden,:id_motivo,:monitor,:tarjeta_video,
                                       :disco_capacidad,:disco_tipo,:disco_marca,:disco_categoria,
                                       :memoria_capacidad,:memoria_tipo,:case_color,:case_marca';*/

            $sql1="INSERT INTO EQUIPO VALUES('0', :id_orden, :id_motivo)";
            $pst1=$cn->prepare($sql1);
            $pst1->bindValue(':id_orden',$la->getOrdenTrabajo()->getId(),PDO::PARAM_INT);
            $pst1->bindValue(':id_motivo',$la->getMotivo(),PDO::PARAM_INT);
            $pst1->execute();

            $id_equipo=$cn->lastInsertId();

            $sql2="INSERT INTO DISCO VALUES (:disco_capacidad, :disco_tipo, :disco_marca, :disco_categoria, :id_equipo)";
            $pst2=$cn->prepare($sql2);
            $pst2->bindValue(':disco_capacidad',$la->getDisco()->getCapacidad(),PDO::PARAM_STR);
            $pst2->bindValue(':disco_tipo',$la->getDisco()->getTipo(),PDO::PARAM_INT);
            $pst2->bindValue(':disco_marca',$la->getDisco()->getMarca(),PDO::PARAM_INT);
            $pst2->bindValue(':disco_categoria',$la->getDisco()->getCategoria(),PDO::PARAM_INT);
            $pst2->bindValue(':id_equipo',$id_equipo,PDO::PARAM_INT);
            $pst2->execute();

            $sql3="INSERT INTO MEMORIA VALUES (:memoria_capacidad, :memoria_tipo, :id_equipo1)";
            $pst3=$cn->prepare($sql3);
            $pst3->bindValue(':memoria_capacidad',$la->getMemoria()->getCapacidad(),PDO::PARAM_STR);
            $pst3->bindValue(':memoria_tipo',$la->getMemoria()->getTipo(),PDO::PARAM_INT);
            $pst3->bindValue(':id_equipo1',$id_equipo,PDO::PARAM_INT);
            $pst3->execute();

            $sql4="INSERT INTO LAPTOP VALUES (:cargador, :bateria, :laptop_color, :laptop_marca, :id_equipo2)";
            $pst4=$cn->prepare($sql4);
            $pst4->bindValue(':cargador',$la->getCargador(),PDO::PARAM_STR);
            $pst4->bindValue(':bateria',$la->getBateria(),PDO::PARAM_STR);
            $pst4->bindValue(':laptop_color',$la->getColor(),PDO::PARAM_INT);
            $pst4->bindValue(':laptop_marca',$la->getMarca(),PDO::PARAM_INT);
            $pst4->bindValue(':id_equipo2',$id_equipo,PDO::PARAM_INT);
            $pst4->execute();
            
            $cn->commit();

            $sum=($pst1->rowCount())+($pst2->rowCount())+($pst3->rowCount())+($pst4->rowCount());
            
            return $sum;
            
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Laptop.dao.php - METODO->setRegistrarLaptop() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
            $cn->rollBack();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function getListaLaptopXtecnico($id_tecnico){//recibe un "id" no es dato de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT E.ID_EQUIPO, ML.NOMBRE AS MARCA, CO.NOMBRE AS COLOR, DI.CAPACIDAD AS DISCO, ME.CAPACIDAD AS MEMORIA, MO.DESCRIPCION AS MOTIVO, E.ESTADO FROM EQUIPO E
                  INNER JOIN LAPTOP LA ON LA.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN ORDEN_TRABAJO O ON O.ID_ORDEN_TRABAJO=E.ID_ORDEN_TRABAJO
                  INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
                  INNER JOIN MOTIVO MO ON MO.ID_MOTIVO=E.ID_MOTIVO
                  INNER JOIN COLOR CO ON CO.ID_COLOR=LA.ID_COLOR
                  INNER JOIN MARCA_LAPTOP ML ON ML.ID_MARCA_LAPTOP=LA.ID_MARCA_LAPTOP
                  INNER JOIN DISCO DI ON DI.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN MEMORIA ME ON ME.ID_EQUIPO=E.ID_EQUIPO
                  LEFT JOIN PAGO PA ON PA.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  WHERE EM.ID_EMPLEADO=:a AND PA.ID_PAGO IS NULL';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_tecnico,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Laptop.dao.php - METODO->getListaLaptopXtecnico() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function getDetalleLaptopXid($id_equipo){//recibe un "id", no es dato de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT E.ID_EQUIPO, ML.NOMBRE AS LAPTOP_MARCA, CO.NOMBRE AS LAPTOP_COLOR, LA.CARGADOR, LA.BATERIA,
                  DI.CAPACIDAD AS DISCO_CAPACIDAD, MD.NOMBRE AS DISCO_MARCA, TD.NOMBRE AS DISCO_TIPO, CD.NOMBRE AS DISCO_CATEGORIA,
                  ME.CAPACIDAD AS MEMORIA_CAPACIDAD, TM.NOMBRE AS MEMORIA_TIPO,
                  MO.DESCRIPCION AS MOTIVO, E.ESTADO FROM EQUIPO E
                  INNER JOIN LAPTOP LA ON LA.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN ORDEN_TRABAJO O ON O.ID_ORDEN_TRABAJO=E.ID_ORDEN_TRABAJO
                  INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
                  INNER JOIN MOTIVO MO ON MO.ID_MOTIVO=E.ID_MOTIVO
                  INNER JOIN COLOR CO ON CO.ID_COLOR=LA.ID_COLOR
                  INNER JOIN MARCA_LAPTOP ML ON ML.ID_MARCA_LAPTOP=LA.ID_MARCA_LAPTOP
                  INNER JOIN DISCO DI ON DI.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN MARCA_DISCO MD ON MD.ID_MARCA_DISCO=DI.ID_MARCA_DISCO
                  INNER JOIN TIPO_DISCO TD ON TD.ID_TIPO_DISCO=DI.ID_TIPO_DISCO
                  INNER JOIN CATEGORIA_DISCO CD ON CD.ID_CATEGORIA_DISCO=DI.ID_CATEGORIA_DISCO
                  INNER JOIN MEMORIA ME ON ME.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN TIPO_MEMORIA TM ON TM.ID_TIPO_MEMORIA=ME.ID_TIPO_MEMORIA
                  WHERE E.ID_EQUIPO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_equipo,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetch(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Laptop.dao.php - METODO->getDetalleLaptopXid() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
}
?>