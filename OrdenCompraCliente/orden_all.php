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

    $query = "call sp_ordencompracliente_all($anio,$mes);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idordencompracliente' => $row['idordencompracliente'],
                'folioordencompra' => $row['folioordencompra'],
                'fecha' => $row['fecha'], 
                'idcliente' => $row['idcliente'],
                'nombrecliente' => $row['nombrecliente'],
                'idcotizacion' => $row['idcotizacion'],
                'foliocotizacion' => $row['foliocotizacion'],
                'lugarservicio' => $row['lugarservicio']
            );

            $arrayTodo[] = $arraySingle;
        }
        echo json_encode($arrayTodo);
    }
?>
