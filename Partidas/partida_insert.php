<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idpartida = form2insert($_POST['idpartida'],1);
    $descpartida = form2insert($_POST['descpartida'],0);
    $cuentacontable = form2insert($_POST['cuentacontable'],0);
    $tipopartida = form2insert($_POST['tipopartida'],0);
    $pviaticos = form2insert($_POST['viaticos'],0);
    $pimporteunitario = form2insert($_POST['importeunitario'],1);

    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();

    $query = "call sp_partida_ups(
        $idpartida,
        $descpartida,
        $cuentacontable,
        $tipopartida,
        $pviaticos,
        $pimporteunitario,
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