<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    //$fecha_ini = form2insert($_POST['fecha_ini'],0);
    //$fecha_fin = form2insert($_POST['fecha_fin'],0);

    $dias = form2insert($_POST['dias'],1);
    
    $query = "call sp_rptcontratosvencer($dias)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'nombrecompleto' => $row['nombrecompleto'],
                'descregion' => $row['descregion'],
                'descadscripcion' => $row['descadscripcion'],
                'fechacontrato' => $row['fechacontrato'],
                'fechainicial' => $row['fechainicial'],
                'fechafinal' => $row['fechafinal'],
                'diascontrato' => $row['diascontrato'],
                'periodocontrato' => $row['periodocontrato']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>