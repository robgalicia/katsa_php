<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidentregable = $_POST['identregable'];

    $query = "call sp_entregable_sel($pidentregable)";
    $result = $bd->query($query);
    //echo $query;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'identregable' => $row['identregable'],
                'descentregable' => $row['descentregable'],
                'iddepartamento' => $row['iddepartamento'],
                'descdepartamento' => $row['descdepartamento'],
                'idcategoria' => $row['idcategoria'],
                'desccategoria' => $row['desccategoria']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>