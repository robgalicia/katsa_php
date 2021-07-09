<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $ptipobusqueda = form2insert($_POST['tipoarticulo'],0);
    $pdescripcion = $_POST['descarticulo'];

    $query = "call sp_articulo_all($ptipobusqueda, '$pdescripcion')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idarticulo' => $row['idarticulo'],
                'codigoarticulo' => $row['codigoarticulo'],
                'preciocompra' => $row['preciocompra'],
                'idproveedor' => $row['idproveedor'],
                'nombrearticulo' => $row['nombrearticulo'],
                'descripcionproveedor' => $row['descripcionproveedor'],
                'nombreproveedor' => $row['nombreproveedor']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>