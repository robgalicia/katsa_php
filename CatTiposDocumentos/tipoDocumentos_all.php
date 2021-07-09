<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $query = "call sp_tipodocumento_all()";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idtipodocumento' => $row['idtipodocumento'],
                'desctipodocumento' => $row['desctipodocumento'],
                'solicitarvigencia' => $row['solicitarvigencia'],
                'obligatorioempleado' => $row['obligatorioempleado'],
                'obligatoriosnsp' => $row['obligatoriosnsp'],
                'obligatoriocliente' => $row['obligatoriocliente']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>