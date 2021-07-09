<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $mes = $_POST['mes'];

    $query = "call sp_rptcumplelaboral($mes);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idempleado' => $row['idempleado'],
                'nombrecompleto' => $row['nombrecompleto'],
                'rfc' => $row['rfc'],
                'curp' => $row['curp'],
                'descdepartamento' => $row['descdepartamento'],
                'puestoorganigrama' => $row['puestoorganigrama'],
                'descregion' => $row['descregion'],
                'descadscripcion' => $row['descadscripcion'], 
                'fechaingreso' => $row['fechaingreso'],
                'outsourcing' => $row['outsourcing'],
                'empresa' => $row['empresa'],
                'anios' => $row['anios']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>