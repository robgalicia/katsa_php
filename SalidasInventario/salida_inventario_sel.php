<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidsalidainventario = form2insert($_POST['idsolicitud'],1);

    $query = "call sp_salidainventario_sel($pidsalidainventario);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'folio' => $row['folio'],
                'fechasalida' => $row['fechasalida'],
                'idregion' => $row['idregion'],
                'idadscripcion' => $row['idadscripcion'],
                'idcliente' => $row['idcliente'],
                'iddepartamento' => $row['iddepartamento'],
                'idtiposalidainventario' => $row['idtiposalidainventario'],
                'desctiposalidainventario' => $row['desctiposalidainventario'],
                'idalmacen' => $row['idalmacen'],
                'descalmacen' => $row['descalmacen'],
                'idempleadoautoriza' => $row['idempleadoautoriza'],
                'empleadoautoriza' => $row['empleadoautoriza'],
                'observaciones' => $row['observaciones'],
                'costototalsal' => $row['costototalsal'],
                'idempleadorecibe'  => $row['idempleadorecibe'],
                'empleadorecibe'  => $row['empleadorecibe'],
                'fechacancelacion' => $row['fechacancelacion'],
                'idempleadocancela' => $row['idempleadocancela'],
                'empleadocancela' => $row['empleadocancela'],
                'motivocancelacion' => $row['motivocancelacion'],
                'codigoarticulo' => $row['codigoarticulo'],
                'descarticulo' => $row['descarticulo'],
                'cantidad' => $row['cantidad'],
                'costounitario' => $row['costounitario'],
                'costototal' => $row['costototal']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>