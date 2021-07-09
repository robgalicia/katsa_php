<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idcontrato = $_POST['idcontrato'];

    $query = "call sp_empleadocontrato_del($idcontrato);";
    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => true
    );

    echo json_encode($arraySingle);
    
?>