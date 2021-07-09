<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idempleado = form2insert($_POST['idempleado'],0);
    $idtipodocumento = form2insert($_POST['idtipodocumento'],0);
    $esoriginal = form2insert($_POST['esoriginal'],0);
    $folio = form2insert($_POST['folio'],0);
    $fechaemision = form2insert($_POST['fechaemision'],0);
    $iniciovigencia = form2insert($_POST['iniciovigencia'],0);
    $finalvigencia = form2insert($_POST['finalvigencia'],0);
    $nombrearchivo = form2insert($_POST['nombrearchivo'],0);

    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();

    $query = "call sp_empleadodocumento_ins(
        $idempleado,
        $idtipodocumento,
        $esoriginal,
        $folio,
        $fechaemision,
        $iniciovigencia,
        $finalvigencia,
        $nombrearchivo,
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