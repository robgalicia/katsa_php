<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $pidentregablepuesto = $_POST['identregable'];

    $query = "call sp_entregablepuesto_del($pidentregablepuesto)";
    $result = $bd->query($query);
    //echo $query;
    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
    
?>