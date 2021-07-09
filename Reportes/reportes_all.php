<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    $id = $_SESSION["idusuario"];

    $query = "call sp_usuariomenu_reporte($id);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'menuid' => $row["menuid"],
                'nombremenu' => $row["nombremenu"],
                'posicion' => $row["posicion"],
                'icono' => $row["icono"],
                'url' => $row["url"],
                'ordenmenu' => $row["ordenmenu"],
                'padreid' => $row["padreid"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>