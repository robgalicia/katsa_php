<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidempresaoutsourcing = $_POST['idempresa'];

    $query = "call sp_empresaout_sel($pidempresaoutsourcing)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'nombreempresa' => $row['nombreempresa'],
                'nombrecorto' => $row['nombrecorto'],
                'domicilio' => $row['domicilio'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'idmunicipio' => $row['idmunicipio'],
                'descmunicipio' => $row['descmunicipio'],
                'idestado' => $row['idestado'],
                'descestado' => $row['descestado'],
                'personacontacto' => $row['personacontacto'],
                'telefonocontacto' => $row['telefonocontacto'],
                'correoelectronico' => $row['correoelectronico']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>