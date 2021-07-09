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

    $semana = form2insert($_POST['semana'],0);
    $tarjeta = form2insert($_POST['tarjeta'],0);
    $fecha = form2insert($_POST['fecha'],0);
    $servicio = form2insert($_POST['servicio'],0);
    $responsable = form2insert($_POST['responsable'],0);
    $vehiculo = form2insert($_POST['vehiculo'],0);
    $kilometrajeanterior = form2insert($_POST['kilometrajeanterior'],0);
    $niveltanqueantes = form2insert($_POST['niveltanqueantes'],0);
    $kilometrajecargar = form2insert($_POST['kilometrajecargar'],0);
    $niveltanquedespues = form2insert($_POST['niveltanquedespues'],0);
    $litros = form2insert($_POST['litros'],0);
    $tipocombustible = form2insert($_POST['tipocombustible'],0);
    $preciolitro = form2insert($_POST['preciolitro'],0);
    $preciototal = form2insert($_POST['preciototal'],0);    
    $kilometrosrecorridos = form2insert($_POST['kilometrosrecorridos'],0);
    $rendimientolitro = form2insert($_POST['rendimientolitro'],0);
    $observaciones = form2insert($_POST['observaciones'],0);
        
    $quien = form2insert($_SESSION["nombre"],0);
    $arrayTodo = array();


    $query = "call sp_consumogasolina_ins(        
        $semana,
        $tarjeta,
        $fecha,
        $servicio,
        $responsable,
        $vehiculo,
        $kilometrajeanterior,
        $niveltanqueantes,
        $kilometrajecargar,
        $niveltanquedespues,
        $litros,
        $tipocombustible,
        $preciolitro,
        $preciototal,
        $rendimientolitro,
        $observaciones,
        $kilometrosrecorridos,
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