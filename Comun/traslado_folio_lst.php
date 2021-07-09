<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }  

    $arrayTodo = array();

    $panio = $_POST['anio'];
    $pmes = $_POST['mes'];

    $query = "call sp_traslado_selfolio($panio,$pmes);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idtraslado' => $row["idtraslado"],
                'folio' => $row["folio"],
                'fechaservicio' => $row["fechaservicio"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>