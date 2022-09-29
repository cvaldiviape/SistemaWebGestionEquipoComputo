<?php
require_once '../library/Conexion.php';
require_once '../models/OrdenTrabajo.clase.php';
require_once '../models/Pc.clase.php';
require_once '../models/Disco.clase.php';
require_once '../models/Memoria.clase.php';
require_once '../models/Case.clase.php';

class PcDAO{

    public static function getListaPcXidOrdenTrabajo($id_ot){//recibe un "id", no es dato de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT E.ID_EQUIPO,  E.ESTADO ,MA.NOMBRE AS CASEX, CO.NOMBRE AS COLOR, DI.CAPACIDAD AS DISCO, ME.CAPACIDAD AS MEMORIA, MO.DESCRIPCION AS MOTIVO FROM ORDEN_TRABAJO O
                  INNER JOIN EQUIPO E ON E.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  INNER JOIN MOTIVO MO ON MO.ID_MOTIVO=E.ID_MOTIVO
                  INNER JOIN PC P ON P.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN CASEX CA ON CA.ID_PC=P.ID_PC
                  INNER JOIN MARCA_CASE MA ON MA.ID_MARCA_CASE=CA.ID_MARCA_CASE
                  INNER JOIN COLOR CO ON CO.ID_COLOR=CA.ID_COLOR
                  INNER JOIN DISCO DI ON DI.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN MEMORIA ME ON ME.ID_EQUIPO=E.ID_EQUIPO
                  WHERE O.ID_ORDEN_TRABAJO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_ot,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Pc.dao.php - METODO->getListaPcXidOrdenTrabajo() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function setRegistrarPc($p){//recibe un dato de tipo objeto "Pc".
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            //$cn->beginTransaction();
            /*$sql='EXEC SP_REGISTRAR_PC :id_orden,:id_motivo,:monitor,:tarjeta_video,
                                       :disco_capacidad,:disco_tipo,:disco_marca,:disco_categoria,
                                       :memoria_capacidad,:memoria_tipo,:case_color,:case_marca';*/

            $sql1="INSERT INTO EQUIPO VALUES('0', :id_orden, :id_motivo)";
            $pst1=$cn->prepare($sql1);
            $pst1->bindValue(':id_orden',$p->getOrdenTrabajo()->getId(),PDO::PARAM_INT);
            $pst1->bindValue(':id_motivo',$p->getMotivo(),PDO::PARAM_INT);
            $pst1->execute();

            $id_equipo=$cn->lastInsertId();

            $sql2="INSERT INTO DISCO VALUES (:disco_capacidad, :disco_tipo, :disco_marca, :disco_categoria, :id_equipo)";
            $pst2=$cn->prepare($sql2);
            $pst2->bindValue(':disco_capacidad',$p->getDisco()->getCapacidad(),PDO::PARAM_STR);
            $pst2->bindValue(':disco_tipo',$p->getDisco()->getTipo(),PDO::PARAM_INT);
            $pst2->bindValue(':disco_marca',$p->getDisco()->getMarca(),PDO::PARAM_INT);
            $pst2->bindValue(':disco_categoria',$p->getDisco()->getCategoria(),PDO::PARAM_INT);
            $pst2->bindValue(':id_equipo',$id_equipo,PDO::PARAM_INT);
            $pst2->execute();

            $sql3="INSERT INTO MEMORIA VALUES (:memoria_capacidad, :memoria_tipo, :id_equipo1)";
            $pst3=$cn->prepare($sql3);
            $pst3->bindValue(':memoria_capacidad',$p->getMemoria()->getCapacidad(),PDO::PARAM_STR);
            $pst3->bindValue(':memoria_tipo',$p->getMemoria()->getTipo(),PDO::PARAM_INT);
            $pst3->bindValue(':id_equipo1',$id_equipo,PDO::PARAM_INT);
            $pst3->execute();

            $sql4="INSERT INTO PC VALUES (:monitor, :tarjeta_video, :id_equipo2)";
            $pst4=$cn->prepare($sql4);
            $pst4->bindValue(':monitor',$p->getMonitor(),PDO::PARAM_STR);
            $pst4->bindValue(':tarjeta_video',$p->getTarjetaVideo(),PDO::PARAM_STR);
            $pst4->bindValue(':id_equipo2',$id_equipo,PDO::PARAM_INT);
            $pst4->execute();
            
            $id_pc=$cn->lastInsertId();

            $sql5="INSERT INTO CASEX VALUES (:case_color, :case_marca, :x)";
            $pst5=$cn->prepare($sql5);
            $pst5->bindValue(':case_color',$p->getCase()->getColor(),PDO::PARAM_INT);
            $pst5->bindValue(':case_marca',$p->getCase()->getMarca(),PDO::PARAM_INT);
            $pst5->bindValue(":x",$id_pc,PDO::PARAM_INT);
            $pst5->execute();

            //$cn->commit();

            $sum=($pst1->rowCount())+($pst2->rowCount())+($pst3->rowCount())+($pst4->rowCount())+($pst5->rowCount());
            
            return $sum;
            
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Pc.dao.php - METODO->setRegistrarPc() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
            //$cn->rollBack();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function getListaPcXtecnico($id_tecnido){//recibe un "id", no es dato de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT E.ID_EQUIPO, MA.NOMBRE AS CASEX, CO.NOMBRE AS COLOR, DI.CAPACIDAD AS DISCO, ME.CAPACIDAD AS MEMORIA, MO.DESCRIPCION AS MOTIVO, E.ESTADO FROM ORDEN_TRABAJO O
                  INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
                  INNER JOIN EQUIPO E ON E.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  INNER JOIN MOTIVO MO ON MO.ID_MOTIVO=E.ID_MOTIVO
                  INNER JOIN PC P ON P.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN CASEX CA ON CA.ID_PC=P.ID_PC
                  INNER JOIN MARCA_CASE MA ON MA.ID_MARCA_CASE=CA.ID_MARCA_CASE
                  INNER JOIN COLOR CO ON CO.ID_COLOR=CA.ID_COLOR
                  INNER JOIN DISCO DI ON DI.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN MEMORIA ME ON ME.ID_EQUIPO=E.ID_EQUIPO
                  LEFT JOIN PAGO PA ON PA.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
                  WHERE EM.ID_EMPLEADO=:a AND PA.ID_PAGO IS NULL';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_tecnido,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetchAll(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Pc.dao.php - METODO->getListaPcXtecnico() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
    public static function getDetallePcXid($id_equipo){//recibe un "id", no es dato de tipo objeto
        $x=new Conexion();
        try {
            $cn=$x->getConexion();
            $sql='SELECT E.ID_EQUIPO, E.ESTADO, MO.DESCRIPCION AS MOTIVO, P.TARJETA_VIDEO, P.MONITOR, 
                  DI.CAPACIDAD AS DISCO_CAPACIDAD, TD.NOMBRE AS DISCO_TIPO, MD.NOMBRE AS DISCO_MARCA, CD.NOMBRE AS DISCO_CATEGORIA,
                  ME.CAPACIDAD AS MEMORIA_CAPACIDAD, TM.NOMBRE AS MEMORIA_TIPO,
                  MC.NOMBRE AS CASE_MARCA, CO.NOMBRE AS CASE_COLOR FROM EQUIPO E
                  INNER JOIN MOTIVO MO ON MO.ID_MOTIVO=E.ID_MOTIVO
                  INNER JOIN DISCO DI ON DI.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN TIPO_DISCO TD ON TD.ID_TIPO_DISCO=DI.ID_TIPO_DISCO
                  INNER JOIN MARCA_DISCO MD ON MD.ID_MARCA_DISCO=DI.ID_MARCA_DISCO
                  INNER JOIN CATEGORIA_DISCO CD ON CD.ID_CATEGORIA_DISCO=DI.ID_CATEGORIA_DISCO
                  INNER JOIN MEMORIA ME ON ME.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN TIPO_MEMORIA TM ON TM.ID_TIPO_MEMORIA=ME.ID_TIPO_MEMORIA
                  INNER JOIN PC P ON P.ID_EQUIPO=E.ID_EQUIPO
                  INNER JOIN CASEX CA ON CA.ID_PC=P.ID_PC
                  INNER JOIN MARCA_CASE MC ON MC.ID_MARCA_CASE=CA.ID_MARCA_CASE
                  INNER JOIN COLOR CO ON CO.ID_COLOR=CA.ID_COLOR
                  WHERE E.ID_EQUIPO=:a';
            $pst=$cn->prepare($sql);
            $pst->bindValue(':a',$id_equipo,PDO::PARAM_INT);
            $pst->execute();
            $fila=$pst->fetch(PDO::FETCH_ASSOC);
            return $fila;
        } catch (PDOException $e) {
            echo 'ERROR: DAO->Pc.dao.php - METODO->getDetallePcXid() <br>';
            echo $e->getMessage() . '<br>';
            echo $e->getLine();
        } finally{
            $x->cerrarConexion();
        }
    }
}
?>