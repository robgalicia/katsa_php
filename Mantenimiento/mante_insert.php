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


    $idvehiculomantenimiento = form2insert($_POST['idvehiculomantenimiento'],1);
    $idvehiculo = form2insert($_POST['idvehiculo'],1);
    $fecha = form2insert($_POST['fecha'],0);
    $kilometrajeactual = form2insert($_POST['kilometrajeactual'],1);
    $descservicio = form2insert($_POST['descservicio'],0);
    $tallermecanico = form2insert($_POST['tallermecanico'],1);    
    $idempleado = form2insert($_POST['idempleado'],1);
    $subtotal = form2insert($_POST['subtotal'],1);
    $iva = form2insert($_POST['iva'],1);
    $importetotal = form2insert($_POST['importetotal'],1);
    $observaciones = form2insert($_POST['observaciones'],0);
    $kmsproxmantenimiento = form2insert($_POST['kmsproxmantenimiento'],1);
    $fechapago = form2insert($_POST['fechapago'],0);
    $referenciapago = form2insert($_POST['referenciapago'],0);

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculomantenimiento_ups(
        $idvehiculomantenimiento,
        $idvehiculo,
        $fecha,
        $kilometrajeactual,
        $descservicio,
        $tallermecanico,
        $idempleado,
        $subtotal,
        $iva,
        $importetotal,
        $observaciones,
        $kmsproxmantenimiento,
        $fechapago,
        $referenciapago,
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