<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidhojatraslado = form2insert($_POST['idHojaTraslado'],1);

    $query = "call sp_trasladorecorrido_all($pidhojatraslado);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idtrasladorecorrido' => $row['idtrasladorecorrido'],
                'fecharecorrido' => $row['fecharecorrido'],
                'horasalida' => $row['horasalida'],
                'horallegada' => $row['horallegada'],
                'vehiculo' => $row['vehiculo'],
                'placas' => $row['placas'],
                'empresavehiculo' => $row['empresavehiculo'],
                'operador' => $row['operador'],
                'recorrido' => $row['recorrido'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>