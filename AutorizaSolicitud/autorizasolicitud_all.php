<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $query = "call sp_autorizasolicitud_all();";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idautorizasolicitud' => $row['idautorizasolicitud'],
                'idregion' => $row['idregion'],
                'descregion' => $row['descregion'], 
                'iddepartamento' => $row['iddepartamento'],
                'descdepartamento' => $row['descdepartamento'], 
                'tiposolicitud' => $row['tiposolicitud'],
                'desctiposolicitud' => $row['desctiposolicitud'],
                'idempleadorevisa' => $row['idempleadorevisa'],
                'empleadorevisa' => $row['empleadorevisa'], 
                'idempleadoautoriza' => $row['idempleadoautoriza'],
                'empleadoautoriza' => $row['empleadoautoriza']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>