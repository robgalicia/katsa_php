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
    
    $empleado = $_POST['empleado'];

    $query = "call sp_empleadoincidencia_all($empleado)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idempleadoincidencia' => $row['idempleadoincidencia'],
                'nombrecompleto' => $row['nombrecompleto'],
                'desctipoincidenciaemp' => $row['desctipoincidenciaemp'],
                'fechaincidencia' => $row['fechaincidencia'],
                'nombrearchivojustifica' => $row['nombrearchivojustifica'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>