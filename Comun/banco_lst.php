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

    $query = "call sp_banco_lst()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idbanco' => $row["idbanco"],
                'descbanco' => $row["descbanco"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>