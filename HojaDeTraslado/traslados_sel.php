<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidtraslado = $_POST['idtraslado'];
    $query = "call sp_traslado_sel($pidtraslado)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'folio' => $row['folio'],
                'fechaservicio' => $row['fechaservicio'],
                'solicitante' => $row['solicitante'],
                'empresa' => $row['empresa'],
                'tiposervicio' => $row['tiposervicio'],
                'idrutatraslado' => $row['idrutatraslado'],
                'estraslado' => $row['estraslado'],
                'escordillera' => $row['escordillera'],
                'esavanzada' => $row['esavanzada'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>