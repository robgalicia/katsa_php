<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    

    $query = "call sp_tarjetacombustible_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idtarjetacombustible' => $row['idtarjetacombustible'],
                'numtarjeta' => $row['numtarjeta'],
                'idempleadoresguardo' => $row['idempleadoresguardo'],
                'empleadoresguardo' => $row['empleadoresguardo'],
                'fecharesguardo' => $row['fecharesguardo'],
                'fechabaja' => $row['fechabaja']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>