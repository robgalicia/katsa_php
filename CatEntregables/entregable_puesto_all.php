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
    $pidentregable = $_POST['identregable'];
    
    $query = "call sp_entregablepuesto_all($piddepartamento,$pidentregable)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'identregablepuesto' => $row['identregablepuesto'],
                'idpuesto' => $row['idpuesto'],
                'descpuesto' => $row['descpuesto'],
                'activo' => $row['activo']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>