<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];

    $query = "call sp_reporte_traslados($anio,$mes);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'folio' => $row['folio'],
                'fechaservicio' => $row['fechaservicio'],
                'empresa' => $row['empresa'],
                'solicitante' => $row['solicitante'],
                'descrutatraslado' => $row['descrutatraslado'],
                'importetarifa' => $row['importetarifa'],
                'desctipomoneda' => $row['desctipomoneda'],
                'tiposervicio' => $row['tiposervicio']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>