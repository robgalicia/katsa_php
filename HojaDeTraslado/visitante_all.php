<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidhojatraslado = form2insert($_POST['idHojaTraslado'],1);

    $query = "call sp_trasladovisitante_all($pidhojatraslado);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idtrasladovisitante' => $row['idtrasladovisitante'],
                'nombrevisitante' => $row['nombrevisitante'],
                'empresa' => $row['empresa']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>