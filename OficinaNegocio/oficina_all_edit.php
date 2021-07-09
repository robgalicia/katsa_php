<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $query = "call sp_oficina_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idoficinanegocio' => $row['idoficinanegocio'],
                'nombrecomercial' => $row['nombrecomercial'],
                'gironegocio' => $row['gironegocio'],
                'calle' => $row['calle'],
                'numeroext' => $row['numeroext'],
                'numeroint' => $row['numeroint'],
                'entrecalles' => $row['entrecalles'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'codigopostal' => $row['codigopostal'],
                'idestado' => $row['idestado'],
                'idmunicipio' => $row['idmunicipio'],
                'telefono' => $row['telefono'],
                'nombreoficina' => $row['nombreoficina'],
                'correoelectronico' => $row['correoelectronico'],
                'representantelegal' => $row['representantelegal'],
                'sexorepresentantelegal' => $row['sexorepresentantelegal']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>