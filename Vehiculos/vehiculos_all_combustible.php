<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idvehiculo = $_POST["id_vehiculo"];

    $query = "call sp_vehiculogasolina_selveh($idvehiculo);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'fecha' => $row['fecha'],
                'numtarjeta' => $row['numtarjeta'],
                'servicio' => $row['servicio'],
                'nombreempleado' => $row['nombreempleado'],
                'kilometrajeanterior' => $row['kilometrajeanterior'],
                'niveltanqueantes' => $row['niveltanqueantes'],
                'kilometrajeactual' => $row['kilometrajeactual'],
                'niveltanquedespues' => $row['niveltanquedespues'],
                'desctipocombustible' => $row['desctipocombustible'],
                'cantidadlitros' => $row['cantidadlitros'],
                'preciolitro' => $row['preciolitro'],
                'preciototal' => $row['preciototal'],
                'kilometrosrecorridos' => $row['kilometrosrecorridos'],
                'rendimientolitro' => $row['rendimientolitro']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>