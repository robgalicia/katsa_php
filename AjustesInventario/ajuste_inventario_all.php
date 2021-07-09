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

    $pidalmacen = form2insert($_POST['almacen'],1);
    $panio = form2insert($_POST['ejercicio'],1);
    $pmes = form2insert($_POST['mes'],1);


    $query = "call sp_ajusteinventario_all($pidalmacen, $panio, $pmes)";
    //echo $query;
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idajusteinventario' => $row['idajusteinventario'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'desctipoajusteinventario' => $row['desctipoajusteinventario'],
                'empleadoautoriza' => $row['empleadoautoriza'],
                'observaciones' => $row['observaciones'],
                'fechacancelacion' => $row['fechacancelacion']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>