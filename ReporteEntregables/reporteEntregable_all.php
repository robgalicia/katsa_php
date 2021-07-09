<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $pidpuesto = $_POST['puesto'];
    $pidcategoria = $_POST['categoria'];
    $pfechaini = $_POST['fecha_ini'];
    $pfechafin = $_POST['fecha_fin'];

    $query = "call sp_agendaentregable_rpt($pidpuesto,$pidcategoria,$pfechaini,$pfechafin)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'fecha' => $row['fecha'],
                'descpuesto' => $row['descpuesto'],
                'descentregable' => $row['descentregable'],
                'cantidad' => $row['cantidad'],
                'cumplidos' => $row['cumplidos']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>