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

    
    $idvehiculogasolina = form2insert($_POST['idvehiculogasolina'],1);
    $semana = form2insert($_POST['semana'],1);
    $fecha = form2insert($_POST['fecha'],0);
    $idtarjetacombustible = form2insert($_POST['idtarjetacombustible'],1);
    $idvehiculo = form2insert($_POST['idvehiculo'],1);
    $idregion = form2insert($_POST['idregion'],1);
    $idadscripcion = form2insert($_POST['idadscripcion'],1);
    $idcliente = form2insert($_POST['idcliente'],1);
    $idempleado = form2insert($_POST['idempleado'],1);
    $kilometrajeanterior = form2insert($_POST['kilometrajeanterior'],1);
    $niveltanqueantes = form2insert($_POST['niveltanqueantes'],0);
    $kilometrajeactual = form2insert($_POST['kilometrajeactual'],1);
    $niveltanquedespues = form2insert($_POST['niveltanquedespues'],0);
    $idtipocombustible = form2insert($_POST['idtipocombustible'],1);
    $cantidadlitros = form2insert($_POST['cantidadlitros'],1);
    $preciolitro = form2insert($_POST['preciolitro'],1);
    $preciototal = form2insert($_POST['preciototal'],1);
    $kilometrosrecorridos = form2insert($_POST['kilometrosrecorridos'],1);
    $rendimientolitro = form2insert($_POST['rendimientolitro'],1);
    $observaciones = form2insert($_POST['observaciones'],0);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculogasolina_ups(
        $idvehiculogasolina,
        $semana,
        $fecha,
        $idtarjetacombustible,
        $idvehiculo,
        $idregion,
        $idadscripcion,
        $idcliente,
        $idempleado,
        $kilometrajeanterior,
        $niveltanqueantes,
        $kilometrajeactual,
        $niveltanquedespues,
        $idtipocombustible,
        $cantidadlitros,
        $preciolitro,
        $preciototal,
        $kilometrosrecorridos,
        $rendimientolitro,
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