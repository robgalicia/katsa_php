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

    $query = "call sp_empleado_lst()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idempleado' => $row["idempleado"],
                'nombrecompleto' => $row["nombrecompleto"],
                'fechaingreso' => $row["fechaingreso"],
                'correoelectronico' => $row["correoelectronico"]    
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>