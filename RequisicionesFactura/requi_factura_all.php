<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $idordencomprafactura = form2insert($_POST['idordencomprafactura'],1);    

    $query = "call sp_ordencomprafactura_sel($idordencomprafactura);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idordencompra' => $row['idordencompra'],
                'fechafactura' => $row['fechafactura'],
                'idproveedor' => $row['idproveedor'],
                'nombreproveedor' => $row['nombreproveedor'],
                'tipoventa' => $row['tipoventa'],
                'rfc' => $row['rfc'],
                'diascreditofac' => $row['diascreditofac'],
                'diascreditoprov' => $row['diascreditoprov'],
                'idformapago' => $row['idformapago'],
                'descformapago' => $row['descformapago'],
                'referenciapago' => $row['referenciapago'],
                'fechavencimiento' => $row['fechavencimiento'],
                'importetotal' => $row['importetotal'],
                'uuid' => $row['uuid'],
                'nombrearchivoxml' => $row['nombrearchivoxml'],
                'nombrearchivopdf' => $row['nombrearchivopdf'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>