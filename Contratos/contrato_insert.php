<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idempleado = form2insert($_POST['idempleado'],1);
    $fecha_contrato = form2insert($_POST['fecha_contrato'],0);
    $dias_contrato = form2insert($_POST['dias_contrato'],1);
    $fecha_inicial = form2insert($_POST['fecha_inicial'],0);
    $fecha_final = form2insert($_POST['fecha_final'],0);
    $sueldo_contrato = form2insert($_POST['sueldo_contrato'],1);

    $periodo_contrato = form2insert($_POST['periodo_contrato'],0);
    $esquema_pago = form2insert($_POST['esquema_pago'],0);
    $sueldo_neto = form2insert($_POST['sueldo_neto'],1);

    

    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();

    $query = "call sp_empleadocontrato_ins(
        $idempleado,
        $fecha_contrato,
        $dias_contrato,
        $periodo_contrato,
        $fecha_inicial,
        $fecha_final,
        $esquema_pago,
        $sueldo_contrato,
        $sueldo_neto,
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