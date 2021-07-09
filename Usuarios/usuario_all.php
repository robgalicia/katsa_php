<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }

    $arrayTodo = array();        
    $query = "call sp_usuario_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idusuario' => $row["idusuario"],
                'login' => $row["login"],                
                'nombre' => $row["nombre"],
                'fechaalta' => $row["fechaalta"],                
                'fechabaja' => $row["fechabaja"],
                'nombreempleado' => $row["nombreempleado"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>