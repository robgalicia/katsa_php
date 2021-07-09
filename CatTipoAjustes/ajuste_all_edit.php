<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidtipoajuste = $_POST['idTipoAjuste'];

    $query = "call sp_tipoajusteinventario_sel($pidtipoajuste)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idtipoajusteinventario' => $row['idtipoajusteinventario'],
                'desctipoajusteinventario' => $row['desctipoajusteinventario'],
                'tipomovimiento' => $row['tipomovimiento']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>