<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $idcliente = $_POST['idcliente'];

    $query = "call sp_cliente_sel($idcliente);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'nombre' => $row['nombre'],
                'nombrecomercial' => $row['nombrecomercial'], 
                'calle' => $row['calle'],
                'numexterior' => $row['numexterior'],
                'numinterior' => $row['numinterior'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'], 
                'idmunicipio' => $row['idmunicipio'],
                'descmunicipio' => $row['descmunicipio'],
                'idestado' => $row['idestado'],
                'descestado' => $row['descestado'],
                'codigopostal' => $row['codigopostal'],
                'rfc' => $row['rfc'],
                'personacontacto' => $row['personacontacto'],
                'telefonocontacto' => $row['telefonocontacto'],
                'correoelectronico' => $row['correoelectronico'],
                'cveusocfdi' => $row['cveusocfdi'],
                'porcentajeiva' => $row['porcentajeiva']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>