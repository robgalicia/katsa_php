<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();

    $pidalmacen = form2insert($_POST['almacen'],1);
    $panio = form2insert($_POST['ejercicio'],1);
    $pmes = form2insert($_POST['mes'],1);


    $query = "call sp_salidainventario_all($pidalmacen, $panio, $pmes)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idsalidainventario' => $row['idsalidainventario'],
                'folio' => $row['folio'],
                'fechasalida' => $row['fechasalida'],
                'desctiposalidainventario' => $row['desctiposalidainventario'],
                'empleadoautoriza' => $row['empleadoautoriza'],
                'observaciones' => $row['observaciones'],
                'fechacancelacion' => $row['fechacancelacion']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>