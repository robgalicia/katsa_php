<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();

    $ptipopartida = form2insert($_POST['tipopartida'],0);

    $query = "call sp_partida_lst($ptipopartida)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idpartida' => $row["idpartida"],
                'descpartida' => $row["descpartida"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>