<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();
    $query = "call sp_formatolegal_lst();";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idformatolegal' => $row["idformatolegal"],
                'claveformato' => $row["claveformato"],
                'nombreformatolegal' => $row["nombreformatolegal"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>