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

    $pidgastoscomprobar = form2insert($_POST['pidgastoscomprobar'],0);

    $query = "call sp_gastoscomprobardetalle_partida($pidgastoscomprobar)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idgastoscomprobardetalle' => $row["idgastoscomprobardetalle"],
                'descpartida' => $row["descpartida"]                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>