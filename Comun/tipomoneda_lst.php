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

    $query = "call sp_tipomoneda_lst();";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idtipomoneda' => $row["idtipomoneda"],
                'desctipomoneda' => $row["desctipomoneda"],
                'abreviacion' => $row["abreviacion"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>