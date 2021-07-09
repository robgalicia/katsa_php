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
    
    $pidgastoscomprobardetalle = form2insert($_POST['pidgastoscomprobardetalle'],1);
    $pidgastoscomprobar = form2insert($_POST['pidgastoscomprobar'],1);
    $pidpartida = form2insert($_POST['pidpartida'],1);
    $pimporte = form2insert($_POST['pimporte'],1);
    $pjustificacion = form2insert($_POST['pjustificacion'],0);
    $ptotal = form2insert($_POST['ptotal'],1);
    $pcantidad = form2insert($_POST['pcantidad'],1);

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_gastoscomprobardetalle_ups(
        $pidgastoscomprobardetalle,
        $pidgastoscomprobar,
        $pidpartida,
        $pcantidad,
        $pimporte,
        $ptotal,
        $pjustificacion,
        $quien,
        @last_id
    )";    
    //echo $query;
    $last = -1;

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);

    

?>