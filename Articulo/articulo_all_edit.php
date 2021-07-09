<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
        
    $pidarticulo = $_POST['id'];

    $query = "call sp_articulo_sel($pidarticulo)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idarticulo' => $row['idarticulo'],
                'codigoarticulo' => $row['codigoarticulo'],
                'descarticulo' => $row['descarticulo'],
                'descarticuloprov' => $row['descarticuloprov'],
                'idunidadmedida' => $row['idunidadmedida'],
                'existencia' => $row['existencia'],
                'fechaultimacompra' => $row['fechaultimacompra'],
                'preciocompra' => $row['preciocompra'],
                'idpartidagto' => $row['idpartidagto'],
                'idpartidacto' => $row['idpartidacto'],
                'idpartidainv' => $row['idpartidainv'],
                'idproveedor' => $row['idproveedor'],
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>