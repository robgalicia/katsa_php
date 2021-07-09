<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $query = "call sp_empresaout_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idempresaoutsourcing' => $row['idempresaoutsourcing'],
                'nombrecorto' => $row['nombrecorto'],
                'domicilio' => $row['domicilio'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'descmunicipio' => $row['descmunicipio'],
                'descestado' => $row['descestado']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>