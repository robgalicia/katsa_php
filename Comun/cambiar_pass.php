<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }

    $arrayTodo = array();

    $new_pass = sha1($_POST["new_pass"]);
    $id_usuario = $_SESSION["idusuario"];
    $quien = $_SESSION["nombre"];

    $query = "call sp_usuario_password($id_usuario,'$new_pass','$quien')";
    $result = $bd->query($query);
    
    $arraySingle = array(
        'result' => $result,
        'query' => $query
    );
    echo json_encode($arraySingle);
?>