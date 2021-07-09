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
    $fechapago = form2insert($_POST['fechapago'],0);
    $importepagado = form2insert($_POST['importepagado'],1);
    $fechavigencia = form2insert($_POST['fechavigencia'],0);
    $circulacion = form2insert($_POST['circulacion'],0);
    $placas = form2insert($_POST['placas'],0);
    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculotenencia_ins(
        $idvehiculo,
        $fechapago,
        $importepagado,
        $fechavigencia,
        $placas,
        $circulacion,
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