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

    $query = "call sp_vehiculoresguardo_del($id);";
    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => true
    );

    echo json_encode($arraySingle);
    
?>