<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();

    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $id = $_POST['idregion'];

    $arrayTodo = array();

    $query = "call sp_adscripcion_lst($id)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idadscripcion' => $row["idadscripcion"],
                'descadscripcion' => $row["descadscripcion"],
                'distanciakms' => $row["distanciakms"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>