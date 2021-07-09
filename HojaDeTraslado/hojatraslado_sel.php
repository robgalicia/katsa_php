<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidhojatraslado  = $_POST['idhojatraslado'];
    $query = "call sp_hojatraslado_sel($pidhojatraslado)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idhojatraslado' => $row['idhojatraslado'],
                'idtraslado' => $row['idtraslado'],
                'numhojatraslado' => $row['numhojatraslado'],
                'tiposervicio' => $row['tiposervicio']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>