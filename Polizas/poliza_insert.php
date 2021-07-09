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
    
    $idvehiculo = form2insert($_POST['idvehiculo'],1);    
    $idaseguradora = form2insert($_POST['idaseguradora'],1);
    $numpoliza = form2insert($_POST['numpoliza'],0);
    $iniciovigencia = form2insert($_POST['iniciovigencia'],0);
    $finalvigencia = form2insert($_POST['finalvigencia'],0);
    $fechapago = form2insert($_POST['fechapago'],0);
    $importetotal = form2insert($_POST['importetotal'],1);
    $observaciones = form2insert($_POST['observaciones'],0);
    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculopoliza_ins(
        $idvehiculo,
        $idaseguradora,
        $numpoliza,
        $iniciovigencia,
        $finalvigencia,
        $fechapago,
        $importetotal,
        $observaciones,
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