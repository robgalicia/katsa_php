<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    $id = $_POST["idusuario"];
    $menu = $_POST["idmenu"];

    $query = "call sp_usuariomenu_ups($id,$menu)";
    $result = $bd->query($query);

    $arraySingle = array(        
        'OK' => 'OK',
        'query' => $query
    );

    echo json_encode($arraySingle);
?>