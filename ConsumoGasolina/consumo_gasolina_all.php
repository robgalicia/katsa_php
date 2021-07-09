<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $semana = $_POST['semana'];    

    $query = "call sp_consumogasolina_sel('$semana')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                // 'idconsumogasolina' => $row['idconsumogasolina'],
                'semana' => $row['semana'],
                'tarjeta' => $row['tarjeta'],
                'fecha' => $row['fecha'],
                'servicio' => $row['servicio'],
                'responsable' => $row['responsable'],
                'vehiculo' => $row['vehiculo'],
                'kilometrajeanterior' => $row['kilometrajeanterior'],
                'niveltanqueantes' => $row['niveltanqueantes'],
                'kilometrajecargar' => $row['kilometrajecargar'],
                'niveltanquedespues' => $row['niveltanquedespues'],
                'litros' => $row['litros'],
                'tipocombustible' => $row['tipocombustible'],
                'preciolitro' => $row['preciolitro'],
                'preciototal' => $row['preciototal'],
                'rendimientolitro' => $row['rendimientolitro'],
                'kilometrosrecorridos' => $row['kilometrosrecorridos'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>