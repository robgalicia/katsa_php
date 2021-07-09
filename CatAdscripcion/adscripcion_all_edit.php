<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidadscripcion = $_POST['idadscripcion'];

    $query = "call sp_adscripcion_sel($pidadscripcion)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idadscripcion' => $row['idadscripcion'],
                'descadscripcion' => $row['descadscripcion'],
                'idregion' => $row['idregion'],
                'ubicacion' => $row['ubicacion'],
                'fechainicio' => $row['fechainicio'],
                'fechabaja' => $row['fechabaja'],
                'calle' => $row['calle'],
                'numexterior' => $row['numexterior'],
                'numinterior' => $row['numinterior'],
                'entrecalle' => $row['entrecalle'],
                'ylacalle' => $row['ylacalle'],
                'colonia' => $row['colonia'],
                'codigopostal' => $row['codigopostal'],
                'ciudad' => $row['ciudad'],
                'idmunicipio' => $row['idmunicipio'],
                'idestado' => $row['idestado'],
                'personacontacto' => $row['personacontacto'],
                'telefonocontacto' => $row['telefonocontacto'],
                'correoelectronico' => $row['correoelectronico'],
                'distanciakms' => $row['distanciakms']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>