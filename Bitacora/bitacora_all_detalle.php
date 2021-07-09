<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idsesion = $_POST['idsesion'];

    $query = "call sp_bitactividad_detalle($idsesion);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idsesion' => $row['idsesion'],                
                'idbitactividad' => $row['idbitactividad'],
                'fecha' => $row['fecha'],
                'opcionsistema' => $row['opcionsistema'],
                'opcionpantalla' => $row['opcionpantalla'],
                'query' => $row['query'],
                'detalleaccion' => $row['detalleaccion']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>