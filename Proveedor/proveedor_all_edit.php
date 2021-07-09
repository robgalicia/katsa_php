<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $idproveedor = $_POST['id'];

    $query = "call sp_proveedor_sel($idproveedor)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idproveedor' => $row['idproveedor'],
                'nombre' => $row['nombre'],
                'representante' => $row['representante'],
                'direccion' => $row['direccion'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'idestado' => $row['idestado'],
                'codigopostal' => $row['codigopostal'],
                'rfc' => $row['rfc'],
                'telefono' => $row['telefono'],
                'correoelectronico' => $row['correoelectronico'],
                'diascredito' => $row['diascredito'],
                'bancodeposito' => $row['idbancodeposito'],
                'cuentadeposito' => $row['cuentadeposito'],
                'cuentacontable' => $row['cuentacontable'],
                'personafiscal' => $row['personafiscal']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>