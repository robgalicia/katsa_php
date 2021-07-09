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

    $articulo = form2insert($_POST['nombre'],1);
    $almacen = form2insert($_POST['almacen'],0);
    $fecha_ini = form2insert($_POST['fecha_ini'],0);
    $fecha_fin = form2insert($_POST['fecha_fin'],0);


    $query = "call sp_kardex_all($articulo, $almacen, $fecha_ini, $fecha_fin)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'fechamovimiento' => $row['fechamovimiento'],
                'documentoreferencia' => $row['documentoreferencia'],
                'folioreferencia' => $row['folioreferencia'],
                'tipomovimiento' => $row['tipomovimiento'],
                'cantidad' => $row['cantidad'],
                'existenciaactual' => $row['existenciaactual'],
                'costounitario' => $row['costounitario'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>