<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];

    $query = "call sp_cotizacion_all($anio,$mes);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idcotizacion' => $row['idcotizacion'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'nombrecliente' => $row['nombrecliente'], 
                'tiposervicio' => $row['tiposervicio'],
                'lugarservicio' => $row['lugarservicio'],
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>
