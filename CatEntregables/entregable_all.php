<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $piddepartamento = $_POST['iddepartamento'];
    $pidcategoria = $_POST['idcategoria'];
    
    $query = "call sp_entregable_all($piddepartamento,$pidcategoria)";
    $result = $bd->query($query);

    //echo $query;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'identregable' => $row['identregable'],
                'descentregable' => $row['descentregable'],
                'idpuesto' => $row['idpuesto'],
                'descpuesto' => $row['descpuesto']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>