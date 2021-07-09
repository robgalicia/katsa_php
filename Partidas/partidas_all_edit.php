<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $id = $_POST['id'];

    $query = "call sp_partida_sel($id)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idpartida' => $row['idpartida'],
                'descpartida' => $row['descpartida'],
                'cuentacontable' => $row['cuentacontable'],
                'tipopartida' => $row['tipopartida'],
                'viaticos' => $row['viaticos'],
                'importeunitario' => $row['importeunitario']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>