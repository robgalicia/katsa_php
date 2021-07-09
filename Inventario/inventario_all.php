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
    $ptipobusqueda = form2insert($_POST['tipo'],0);
    $pdescripcion = $_POST['desc'];


    $query = "call sp_articulo_inventario($pidalmacen, $ptipobusqueda, '$pdescripcion')";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idarticulo' => $row['idarticulo'],
                'codigoarticulo' => $row['codigoarticulo'],
                'nombrearticulo' => $row['nombrearticulo'],
                'nombreproveedor' => $row['nombreproveedor'],
                'preciocompra' => $row['preciocompra'],
                'descunidadmedida' => $row['descunidadmedida'],
                'fechaultimacompra' => $row['fechaultimacompra'],
                'existencia' => $row['existencia']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>