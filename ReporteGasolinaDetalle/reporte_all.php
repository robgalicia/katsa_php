<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $fecha_ini = form2insert($_POST['fecha_ini'],0);
    $fecha_fin = form2insert($_POST['fecha_fin'],0);
    
    $query = "call sp_rptvehiculogasolina_detalle($fecha_ini, $fecha_fin)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'fechaini' => $row['fechaini'],
                'fechafin' => $row['fechafin'],
                'semana' => $row['semana'],
                'fecha' => $row['fecha'], 
                'numtarjeta' => $row['numtarjeta'],
                'servicio' => $row['servicio'],
                'nombreempleado' => $row['nombreempleado'],
                'vehiculo' => $row['vehiculo'],
                'niveltanqueantes' => $row['niveltanqueantes'],
                'niveltanquedespues' => $row['niveltanquedespues'],
                'cantidadlitros' => $row['cantidadlitros'],
                'desctipocombustible' => $row['desctipocombustible'],
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