<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $query = "call sp_rptdocumentosvencidos()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'nombrecompleto' => $row['nombrecompleto'],
                'descregion' => $row['descregion'],
                'descadscripcion' => $row['descadscripcion'],
                'desctipodocumento' => $row['desctipodocumento'],
                'fechaemision' => $row['fechaemision'],
                'iniciovigencia' => $row['iniciovigencia']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>