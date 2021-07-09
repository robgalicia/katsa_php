<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];

    $query = "call sp_vehiculogasolina_all('$fecha_ini','$fecha_fin')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idvehiculogasolina' => $row['idvehiculogasolina'],
                'semana' => $row['semana'],
                'fecha' => $row['fecha'],
                'idtarjetacombustible' => $row['idtarjetacombustible'],
                'numtarjeta' => $row['numtarjeta'],
                'idvehiculo' => $row['idvehiculo'],
                'vehiculo' => $row['vehiculo'],
                'idadscripcion' => $row['idadscripcion'],
                'idcliente' => $row['idcliente'],
                'servicio' => $row['servicio'],
                'nombreempleado' => $row['nombreempleado'],
                'kilometrajeanterior' => $row['kilometrajeanterior'],
                'niveltanqueantes' => $row['niveltanqueantes'],
                'kilometrajeactual' => $row['kilometrajeactual'],
                'niveltanquedespues' => $row['niveltanquedespues'],
                'idtipocombustible' => $row['idtipocombustible'],
                'desctipocombustible' => $row['desctipocombustible'],
                'cantidadlitros' => $row['cantidadlitros'],
                'preciolitro' => $row['preciolitro'],
                'preciototal' => $row['preciototal'],
                'kilometrosrecorridos' => $row['kilometrosrecorridos'],
                'rendimientolitro' => $row['rendimientolitro'],
                'observaciones' => $row['observaciones'],
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>