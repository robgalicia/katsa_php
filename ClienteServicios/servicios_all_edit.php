<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $idclienteservicio = $_POST['idclienteservicio'];

    $query = "call sp_clienteservicio_sel($idclienteservicio)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idclienteservicio' => $row['idclienteservicio'],
                'idservicio' => $row['idservicio'],
                'descripcioncorta' => $row['descripcioncorta'],
                'descservicio' => $row['descservicio'],
                'preciounitario' => $row['preciounitario'],
                'idtipomoneda' => $row['idtipomoneda'],
                'desctipomoneda' => $row['desctipomoneda']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>