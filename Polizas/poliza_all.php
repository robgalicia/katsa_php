<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "call sp_vehiculopoliza_all($id_vehiculo)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idvehiculopoliza' => $row['idvehiculopoliza'],
                'idaseguradora' => $row['idaseguradora'],
                'descaseguradora' => $row['descaseguradora'],
                'numpoliza' => $row['numpoliza'],
                'iniciovigencia' => $row['iniciovigencia'],
                'finalvigencia' => $row['finalvigencia'],
                'fechapago' => $row['fechapago'],
                'importetotal' => $row['importetotal'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>