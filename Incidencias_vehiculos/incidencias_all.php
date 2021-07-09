<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();

    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();

    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "call sp_vehiculoincidencia_all($id_vehiculo)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idvehiculoincidencia' => $row['idvehiculoincidencia'],
                'fechaincidencia' => $row['fechaincidencia'],
                'desctipoincidenciaveh' => $row['desctipoincidenciaveh'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>