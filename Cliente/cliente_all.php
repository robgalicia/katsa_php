<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $query = "call sp_cliente_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idcliente' => $row['idcliente'],
                'nombre' => $row['nombre'],
                'calle' => $row['calle'],
                'numexterior' => $row['numexterior'],
                'numinterior' => $row['numinterior'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'], 
                'descmunicipio' => $row['descmunicipio'],
                'descestado' => $row['descestado'],
                'codigopostal' => $row['codigopostal'],
                'rfc' => $row['rfc'],
                'personacontacto' => $row['personacontacto']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>