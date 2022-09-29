<?php
//CONEXION ORIENTADO A OBJETOS CON PDO
try {
    $cn = new PDO("mysql:host=localhost;dbname", "root", "");
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $cn->beginTransaction();//SOLO USAR CUANDO SE REALIZAN "INSERT", "UPDATE" Y "DELETE".
    $sql = 'SELECT CL.NOMBRE, CL.APELLIDO, CL.CELULAR FROM CLIENTE CL
            INNER JOIN ORDEN_TRABAJO O ON O.ID_CLIENTE=CL.ID_CLIENTE
            INNER JOIN EQUIPO E ON E.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
            WHERE ID_EQUIPO=:a';

    $pst = $cn->prepare($sql);
    $pst->bindValue(':a', 20, PDO::PARAM_INT);
    $pst->execute();

    $cn->commit();//si todo va bien, se guarda la transaccion.
    $fila = $pst->fetch(PDO::FETCH_ASSOC);

    $pst->closeCursor();//Cerramos el cursor
    $cn=null;//cerramos la conexion

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    $cn->rollBack();
}

//CONEXION PROCEDIMENTAL CON MYSQLI
$cn=mysqli_connect("localhost", "root", "");
if(mysqli_connect_errno()){
    echo "Fallo de conexion con la BBDD";
    exit();
}
mysqli_select_db($cn, "MI_BASE_DATOS") or die ("No se encuentra la BB.DD");

$sql="SELECT * FROM PRODUCTOS WHERE PAIS_ORIGEN='CHINA'";
$pst=mysqli_query($cn, $sql);


while(($fila=mysqli_fetch_array($pst, MYSQLI_ASSOC))){   
    echo $fila['CODIGO'];
    echo $fila['NOMBRE_ARTICULO'];
    echo $fila['SECCION'];
    echo $fila['IMPORTADO'];
    echo $fila['PRECIO'];
    echo $fila['PAIS_ORIGEN'];
    echo "<br>";
}

mysqli_close($conexion);

//CONEXION ORIENTADO A OBJETOS CON MYSQLI

$cn=new mysqli("localhost", "root", "", "base_datos");
if($cn->connect_errno){//indica si ocurrio un error al conectar con la BBDD.
    echo "Fallo en la conexion " . $conexion->connect_errno; 
 }

 $sql="SELECT * FROM PRODUCTOS";

 $pst=$cn->query($sql);
 
 if ($cn->errno) {//si la sentencia sql falla por alguna razon.
     die/($cn->error);//matamos el error.
 }
 while($fila=$pst->fetch_assoc()){
    echo "<table>
            <tr>
              <td>" .  $fila['CODIGO'] . "</td>
              <td>" .  $fila['SECCION'] . "</td>
              <td>" .  $fila['NOMBRE_ARTICULO'] . "</td>
              <td>" .  $fila['PRECIO'] . "</td>
              <td>" .  $fila['FECHA'] . "</td>
              <td>" .  $fila['IMPORTADO'] . "</td>
              <td>" .  $fila['PAIS_ORIGEN'] . "</td>
            </tr>
          </table>
          <br>
          <br>";
}   

?>
