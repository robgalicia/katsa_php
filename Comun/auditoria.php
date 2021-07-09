<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }   

    $arrayTodo = array();
    
    $idsesion = form2insert($_SESSION['idsesion'],1);
    $opcionsistema = form2insert($_POST['opcionsistema'],0);
    $opcionpantalla = form2insert($_POST['opcionpantalla'],0);
    $tipomovimiento = form2insert($_POST['query'],0);
    $detalleaccion = $_POST['detalleaccion'];

    $query = '';
    $result = '';
    $status = '';

    $query = "call sp_bitactividad_ins(
        $idsesion,
        $opcionsistema,
        $opcionpantalla,
        $tipomovimiento,
        '$detalleaccion'
    )";
    $result = $bd->query($query);


    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>