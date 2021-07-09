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
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $quien = $_SESSION["nombre"];

    $query = '';
    $result = '';
    $status = '';

    if (file_exists($nombre)) {
        $query = "call sp_vehiculoresguardo_updarchivo($id,'$nombre','$quien')";
        $result = $bd->query($query);
        $status = true;
    } else {
        $status = false;
    }

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'nombre' => $nombre,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>