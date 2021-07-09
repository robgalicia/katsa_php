<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $nombre = $_POST['nombre'];

    $query = "call sp_empleado_like('$nombre')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idempleado' => $row['idempleado'],
                'nombrecompleto' => $row['nombrecompleto'],
                'rfc' => $row['rfc'],
                'puesto' => $row['puesto'],
                'regionactual' => $row['regionactual'],
                'adscripcionactual' => $row['adscripcionactual'],
                'fechaingreso' => $row['fechaingreso'],
                'estatus' => $row['estatus'],
                'numempleado' => $row['numempleado'],
                'fechabaja' => $row['fechabaja']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>