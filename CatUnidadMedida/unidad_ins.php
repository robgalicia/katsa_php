<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();

    $movil = true;

    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }  
    
    $pidunidadmedida = form2insert($_POST['idunidadmedida'],1);
    $pdescunidadmedida = form2insert($_POST['descunidadmedida'],0);
    $pnombrecorto = form2insert($_POST['nombrecorto'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_unidadmedida_ups(
        $pidunidadmedida,
        $pdescunidadmedida,
        $pnombrecorto,
        $quien,
        @last_id
    )";

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>