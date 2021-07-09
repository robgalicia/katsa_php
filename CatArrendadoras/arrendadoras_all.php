<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $query = "call sp_arrendadora_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(  
                'idarrendadora' => $row['idarrendadora'],              
                'nombre' => $row['nombre'],
                'calle' => $row['calle'],
                'numexterior' => $row['numexterior'],
                'numinterior' => $row['numinterior'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'idmunicipio' => $row['idmunicipio'],
                'idestado' => $row['idestado'],
                'codigopostal' => $row['codigopostal'],
                'rfc' => $row['rfc'],
                'personacontacto' => $row['personacontacto'],
                'telefonocontacto' => $row['telefonocontacto'],
                'correoelectronico' => $row['correoelectronico'],
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>