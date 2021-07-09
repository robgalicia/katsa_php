<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }   

    $iddepartamento = $_SESSION["iddepartamento"];
    $idcategoria = $_POST['idcategoria'];
    $arrayTodo = array();

    $query = "call sp_entregable_lst($iddepartamento,$idcategoria)";
    //echo $query;
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'identregable' => $row["identregable"],
                'descentregable' => $row["descentregable"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>