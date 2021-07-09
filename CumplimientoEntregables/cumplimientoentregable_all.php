<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $pidagendaentregable  = $_POST['idagendaentregable'];
    
    $query = "call sp_cumplimientoentregable_all($pidagendaentregable )";
    $result = $bd->query($query);

    //echo $query;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idcumplimientoentregable' => $row['idcumplimientoentregable'],
                'fechaentrega' => $row['fechaentrega'],
                'cantidadentregada' => $row['cantidadentregada'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>