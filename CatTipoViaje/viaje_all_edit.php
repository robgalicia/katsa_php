<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidtipoviaje = $_POST['idtipoviaje'];

    $query = "call sp_tipoviaje_sel($pidtipoviaje)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idtipoviaje' => $row['idtipoviaje'],
                'desctipoviaje' => $row['desctipoviaje']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>