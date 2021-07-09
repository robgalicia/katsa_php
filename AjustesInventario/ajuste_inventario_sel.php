<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidajusteinventario = form2insert($_POST['idajusteinventario'],1);

    $query = "call sp_ajusteinventario_sel($pidajusteinventario);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idajusteinventario' => $row['idajusteinventario'],
                'fecha' => $row['fecha'],
                'folio' => $row['folio'],
                'idtipoajusteinventario' => $row['idtipoajusteinventario'],
                'idalmacen' => $row['idalmacen'],
                'idempleadoautoriza' => $row['idempleadoautoriza'],
                'observaciones' => $row['observaciones'],
                'costototal' => $row['costototal'],
                'idempleadocancela' => $row['idempleadocancela'],
                'fechacancelacion' => $row['fechacancelacion'],
                'motivocancelacion' => $row['motivocancelacion'],
                'idarticulo' => $row['idarticulo'],
                'cantidad' => $row['cantidad'],
                'costounitario' => $row['costounitario'],
                'costototal'  => $row['costototal'],
                'desctipoajusteinventario'  => $row['desctipoajusteinventario'],
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
                'idproveedor' => $row['idproveedor']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>