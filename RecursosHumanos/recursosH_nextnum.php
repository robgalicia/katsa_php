<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $query = "call sp_empleado_nextnum(@last_id);";
    
    $result = $bd->query($query);

    $last = -1;

    $result = $bd->query($query);

    $result = $bd->query("select @last_id as lastid;");

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $last = $row['lastid'];

        }        
    }

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'lastid' => $last,
        'result' => $result
    );

    echo json_encode($arraySingle);


?>