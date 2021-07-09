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

    $idordencomprafactura = form2insert($_POST['idordencomprafactura'],1);
    $idordencompra = form2insert($_POST['idordencompra'],1);
    $fechafactura = form2insert($_POST['fechafactura'],0);
    $rfcproveedor = form2insert($_POST['rfcproveedor'],0);
    $nombreproveedor = form2insert($_POST['nombreproveedor'],0);
    $tipoventa = form2insert($_POST['tipoventa'],0); //(C)ontado - (P)Credito
    $idformapago = form2insert($_POST['idformapago'],1);
    $referenciapago = form2insert($_POST['referenciapago'],0);
    $diascredito = form2insert($_POST['diascredito'],1);
    $fechavencimiento = form2insert($_POST['fechavencimiento'],0);
    $importetotal = form2insert($_POST['importetotal'],1);
    $uuid = form2insert($_POST['uuid'],0);
    $nombrearchivoxml = form2insert($_POST['nombrearchivoxml'],0);
    $nombrearchivopdf = form2insert($_POST['nombrearchivopdf'],0);
    $observaciones = form2insert($_POST['observaciones'],0);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_ordencomprafactura_ups(
        $idordencomprafactura,
        $idordencompra,
        $fechafactura,
        $rfcproveedor,
        $nombreproveedor,
        $tipoventa,
        $idformapago,
        $referenciapago,
        $diascredito,
        $fechavencimiento,
        $importetotal,
        $uuid,
        $nombrearchivoxml,
        $nombrearchivopdf,
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