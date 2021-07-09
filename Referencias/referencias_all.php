<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idempleado = $_POST['idempleado'];

    $query = "call sp_empleadoreferencia_all($idempleado)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idempleadoreferencia' => $row['idempleadoreferencia'],
                'idtipoparentesco' => $row['idtipoparentesco'],
                'desctipoparentesco' => $row['desctipoparentesco'],
                'nombre' => $row['nombre'],
                'domicilio' => $row['domicilio'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'idestado' => $row['idestado'],
                'telefono' => $row['telefono'],
                'rfc' => $row['rfc'],
                'curp' => $row['curp'],
                'correoelectronico' => $row['correoelectronico'],
                'fechanacimiento' => $row['fechanacimiento'],
                'porcentaje' => $row['porcentaje'],
                'esbeneficiario' => $row['esbeneficiario']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>