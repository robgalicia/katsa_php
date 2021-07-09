<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidrutatraslado  = $_POST['idrutatraslado'];

    $query = "call sp_rutatraslado_sel($pidrutatraslado )";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'descrutatraslado' => $row['descrutatraslado'],
                'importetarifa' => $row['importetarifa'],
                'idtipomoneda' => $row['idtipomoneda'],
                'tipomoneda' => $row['tipomoneda']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>