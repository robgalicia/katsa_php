<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $fecha_ini = form2insert($_POST['fecha_ini'],0);
    $fecha_fin = form2insert($_POST['fecha_fin'],0);
    
    $query = "call sp_rptincidenciasempleados($fecha_ini, $fecha_fin)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'nombrecompleto' => $row['nombrecompleto'],
                'puestoorganigrama' => $row['puestoorganigrama'],
                'descregion' => $row['descregion'],
                'descadscripcion' => $row['descadscripcion'],
                'fechaincidencia' => $row['fechaincidencia'],
                'justificado' => $row['justificado'],                
                'tipoincidencia' => $row['tipoincidencia']
            );
            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>