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
    
    $idtarjetacombustible = form2insert($_POST['idtarjetacombustible'],1);    
    $numtarjeta = form2insert($_POST['numtarjeta'],1);
    $idempleadoresguardo = form2insert($_POST['idempleadoresguardo'],1);
    $fecharesguardo = form2insert($_POST['fecharesguardo'],0);
    $fechabaja = form2insert($_POST['fechabaja'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_tarjetacombustible_ups(
        $idtarjetacombustible,
        $numtarjeta,
        $idempleadoresguardo,
        $fecharesguardo,
        $fechabaja,
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