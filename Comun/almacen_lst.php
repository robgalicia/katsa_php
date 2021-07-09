<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();

    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }
    
    $arrayTodo = array();

    $query = "call sp_almacen_lst()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idalmacen' => $row["idalmacen"],
                'descalmacen' => $row["descalmacen"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>