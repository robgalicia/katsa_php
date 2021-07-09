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
    
    $pidtipoajusteinventario = form2insert($_POST['pidtipoajusteinventario'],1);    
    $pdesctipoajusteinventario = form2insert($_POST['pdesctipoajusteinventario'],0);
    $ptipomovimiento = form2insert($_POST['ptipomovimiento'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_tipoajusteinventario_ups(
        $pidtipoajusteinventario,
        $pdesctipoajusteinventario,
        $ptipomovimiento,
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