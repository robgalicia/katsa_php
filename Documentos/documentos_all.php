<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idempleado = $_POST['idempleado'];

    $query = "call sp_empleadodocumento_all($idempleado)";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idempleadodocumento' => $row['idempleadodocumento'],
                'idtipodocumento' => $row['idtipodocumento'],
                'desctipodocumento' => $row['desctipodocumento'],
                'esoriginal' => $row['esoriginal'],
                'folio' => $row['folio'],
                'fechaemision' => $row['fechaemision'],
                'obligatorioempleado' => $row['obligatorioempleado'],                
                'iniciovigencia' => $row['iniciovigencia'],
                'finalvigencia' => $row['finalvigencia'],
                'solicitararchivo' => $row['solicitararchivo'],
                'nombrearchivo' => $row['nombrearchivo']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>