<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();
    
    $id = $_POST["idusuario"];

    $query = "call sp_usuario_sel($id)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idusuario' => $row['idusuario'],
                'login' => $row['login'],
                'password' => $row['password'],
                'nombre' => $row['nombre'],
                'fechaalta' => $row['fechaalta'],
                'fechabaja' => $row['fechabaja'],
                'idempleado' => $row['idempleado']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>