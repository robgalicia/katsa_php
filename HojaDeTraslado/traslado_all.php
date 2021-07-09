<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $panio = form2insert($_POST['anio'],1);
    $pmes = form2insert($_POST['mes'],1);

    $query = "call sp_hojatraslado_all($panio,$pmes);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idhojatraslado' => $row['idhojatraslado'],
                'idtraslado' => $row['idtraslado'],
                'numhojatraslado' => $row['numhojatraslado'],
                'tiposervicio' => $row['tiposervicio'],
                'folio' => $row['folio'],
                'fechaservicio' => $row['fechaservicio'],
                'solicitante' => $row['solicitante'],
                'empresa' => $row['empresa'],
                'descrutatraslado' => $row['descrutatraslado']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>