<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();

    $movil = true;

    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $id = 0;

    if($movil){
        $id = $_POST["idusuario"];
    }else{
        $id = $_SESSION["idusuario"];
    }    

    $arrayTodo = array();    

    $query = "call sp_usuariomenu($id)";
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
                'appmovil' => $row["appmovil"],
                'es_reporte' => $row["es_reporte"],
                'padreid' => $row["padreid"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>