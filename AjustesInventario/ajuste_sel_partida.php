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

    $pidpartida = form2insert($_POST['idpartida'],1);


    $query = "call sp_articulo_selpartida($pidpartida)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idarticulo' => $row['idarticulo'],
                'codigoarticulo' => $row['codigoarticulo'],
                'nombrearticulo' => $row['nombrearticulo'],
                'descripcionproveedor' => $row['descripcionproveedor'],
                'preciocompra' => $row['preciocompra'],
                'idproveedor' => $row['idproveedor'],
                'nombreproveedor' => $row['nombreproveedor']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>