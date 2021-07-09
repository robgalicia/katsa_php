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

    $query = "call sp_aseguradora_lst()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idaseguradora' => $row["idaseguradora"],
                'descaseguradora' => $row["descaseguradora"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>