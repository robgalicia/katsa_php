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
    
    $query = "call sp_rptvehiculopoliza($fecha_ini, $fecha_fin)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'placas' => $row['placas'],
                'marcasubmarca' => $row['marcasubmarca'],
                'modelo' => $row['modelo'],
                'numeconomico' => $row['numeconomico'],
                'numpoliza' => $row['numpoliza'],
                'descaseguradora' => $row['descaseguradora'],
                'fechapago' => $row['fechapago'],
                'iniciovigencia' => $row['iniciovigencia'],
                'finalvigencia' => $row['finalvigencia']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>