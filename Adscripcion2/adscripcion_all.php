<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();
    $query = "call sp_adscripcion_all();";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idadscripcion' => $row["idadscripcion"],
                'descadscripcion' => $row["descadscripcion"],

                'fechainicio' => $row["fechainicio"],

                'fechabaja' => $row["fechabaja"],

                'ciudad' => $row["ciudad"],

                'municipio' => $row["municipio"],

                'estado' => $row["estado"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>