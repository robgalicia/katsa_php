<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $pfechaini = $_POST['fecha_ini'];
    $pfechafin = $_POST['fecha_fin'];

    $query = "call sp_rptcumpleaniversario('$pfechaini','$pfechafin');";
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
                'fechanacimiento' => $row['fechanacimiento'],                
                'edad' => $row['edad']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>