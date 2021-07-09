<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $serv = $_POST["servicio"];

    $query = "call sp_servicio_like('$serv')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idservicio' => $row['idservicio'],
                'descripcioncorta' => $row['descripcioncorta'],
                'preciounitario' => $row['preciounitario'],
                'idtipomoneda' => $row['idtipomoneda'],
                'desctipomoneda' => $row['desctipomoneda']             
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>