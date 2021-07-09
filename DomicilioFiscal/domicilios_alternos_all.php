<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $id_cliente = $_POST["id_cliente"];

    $query = "call sp_clientedomiciliofiscal_all($id_cliente)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idclientedomiciliofiscal' => $row['idclientedomiciliofiscal'],
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