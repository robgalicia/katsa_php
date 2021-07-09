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

    $pidgastoscomprobardetalle = form2insert($_POST['idgastoscomprobardetalle'],1);
    $ptipocomprobante = form2insert($_POST['tipocomprobante'],0);
    $pfoliocomprobante = form2insert($_POST['foliocomprobante'],0);
    $pfecha = form2insert($_POST['fecha'],0);
    $pproveedor = form2insert($_POST['proveedor'],0);
    $prfcproveedor = form2insert($_POST['rfcproveedor'],0);
    $puuid = form2insert($_POST['uuid'],0);
    $pnombrearchivoxml = form2insert($_POST['nombrearchivoxml'],0);
    $pnombrearchivopdf = form2insert($_POST['nombrearchivopdf'],0);
    $pobservaciones = form2insert($_POST['observaciones'],0);
    $pimportetotal = form2insert($_POST['importetotal'],1);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_gastoscomprobarfactura_ins(
        $pidgastoscomprobardetalle,
        $ptipocomprobante,
        $pfoliocomprobante,
        $pfecha,
        $pproveedor,
        $prfcproveedor,
        $puuid,
        $pnombrearchivoxml,
        $pnombrearchivopdf,
        $pobservaciones,
        $pimportetotal,
        $quien,
        @last_id
    )";
    //echo $query;

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>