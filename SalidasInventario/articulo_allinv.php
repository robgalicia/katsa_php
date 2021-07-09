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
    $pidbusqueda = form2insert($_POST['idbusqueda'],0);
    $pdescripcion = form2insert($_POST['descripcion'],0);


    $query = "call sp_articulo_allinv($pidalmacen, $pidbusqueda, $pdescripcion)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idarticulo' => $row['idarticulo'],
                'codigoarticulo' => $row['codigoarticulo'],
                'nombrearticulo' => $row['nombrearticulo'],
                'descripcionproveedor' => $row['descripcionproveedor'],
                'costounitario' => $row['costounitario'],
                'nombreproveedor' => $row['nombreproveedor'],
                'existencia' => $row['existencia']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>