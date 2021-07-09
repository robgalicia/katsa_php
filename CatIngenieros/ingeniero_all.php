<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();    

    $movil = true;

    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();
    
    $idcliente = $_POST['idcliente'];

    $query = "call sp_ingeniero_all($idcliente)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idingeniero' => $row['idingeniero'],
                'nombre' => $row['nombre'],
                'idcliente' => $row['idcliente'],
                'cliente' => $row['cliente'],
                'activo' => $row['activo'],
                'idsubcontrata' => $row['idsubcontrata'],
                'subcontrata' => $row['subcontrata']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>