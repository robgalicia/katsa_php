<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidgastoscomprobardetalle = form2insert($_POST['idsolicitud'],1);

    $query = "call sp_gastoscomprobardetalle_sel($pidgastoscomprobardetalle);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idpartida' => $row['idpartida'],
                'cantidad' => $row['cantidad'],
                'importe' => $row['importe'],
                'total' => $row['total'],
                'justificacion' => $row['justificacion'],
                'cantidadautoriza' => $row['cantidadautoriza'],
                'importeautoriza' => $row['importeautoriza'],
                'totalautoriza' => $row['totalautoriza']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>