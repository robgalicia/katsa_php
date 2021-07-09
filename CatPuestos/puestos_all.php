<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $dep = $_POST["departamento"];

    $query = "call sp_puesto_all($dep)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idpuesto' => $row['idpuesto'],
                'descpuesto' => $row['descpuesto'],
                'tipopuesto' => $row['tipopuesto'],
                'descfunciones' => $row['descfunciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>