<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $idorden = form2insert($_POST['idorden'],1);

    $query = "call sp_ordencompra_sel($idorden);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                
                'idordencompra' => $row['idordencompra'],
                'folio' => $row['folio'],
                'fechaorden' => $row['fechaorden'],
                'idproveedor' => $row['idproveedor'],
                'proveedor' => $row['nombreproveedor'],
                'idregion' => $row['idregion'],
                'iddepartamento' => $row['iddepartamento'],
                'idempleadoordena' => $row['idempleadoordena'],
                'observaciones' => $row['observaciones'],
                'importetotal' => $row['importetotal'],
                'idordencompradetalle' => $row['idordencompradetalle'],
                'idarticulo' => $row['idarticulo'],
                'descarticulo' => $row['descarticulo'],
                'cantidad' => $row['cantidad'],
                'importe' => $row['importe'],
                'total' => $row['total']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>