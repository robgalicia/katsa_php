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
    $pmes = $_POST['mes'];
    $panio = $_POST['anio'];
    
    $query = "call sp_agendaentregable_all($pidpuesto,$pidcategoria,$pmes,$panio)";
    $result = $bd->query($query);

    //echo $query;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idagendaentregable' => $row['idagendaentregable'],
                'descentregable' => $row['descentregable'],
                'cantidad' => $row['cantidad'],
                'cumplidos' => $row['cumplidos'],
                'fechacompromiso' => $row['fechacompromiso']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>