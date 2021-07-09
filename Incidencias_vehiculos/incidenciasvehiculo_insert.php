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

    $pidvehiculo = form2insert($_POST['pidvehiculo'],1);
    $pfechaincidencia = form2insert($_POST['pfechaincidencia'],0);
    $pidtipoincidenciaveh = form2insert($_POST['pidtipoincidenciaveh'],1);
    $pidempleadoregistra = form2insert($_POST['pidempleadoregistra'],1);
    $pobservaciones = form2insert($_POST['pobservaciones'],0);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculoincidencia_ins(
        $pidvehiculo,
        $pfechaincidencia,
        $pidtipoincidenciaveh,
        $pidempleadoregistra,
        $pobservaciones,
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