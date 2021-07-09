<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidcuentabancaria = $_POST['idcuentabancaria'];

    $query = "call sp_cuentabancaria_sel($pidcuentabancaria)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idcuentabancaria' => $row['idcuentabancaria'],
                'idbanco' => $row['idbanco'],
                'numerocuenta' => $row['numerocuenta'],
                'clabeinterbancaria' => $row['clabeinterbancaria'],
                'cuentacontable' => $row['cuentacontable']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>