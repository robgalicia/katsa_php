<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();    

    $query = "call sp_vehiculo_all();";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idvehiculo' => $row['idvehiculo'],
                'placas' => $row['placas'],
                'descmarcavehiculo' => $row['descmarcavehiculo'],
                'submarca' => $row['submarca'],
                'aniomodelo' => $row['aniomodelo'],
                'numeconomico' => $row['numeconomico'],
                'nombrecliente' => $row['nombrecliente'],
                'adscripcionactual' => $row['adscripcionactual'],
                'empresa' => $row['empresa'],
                'estatus' => $row['estatus']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>