<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $fecha_ini = $_POST['fecha_ini'];

    $query = "call sp_bitsesion_all('$fecha_ini');";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idsesion' => $row['idsesion'],                
                'login' => $row['login'],
                'fechalogin' => $row['fechalogin'],
                'fechalogout' => $row['fechalogout'],                
                'nombre' => $row['nombre']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>