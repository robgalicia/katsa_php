<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidgastoscomprobar = form2insert($_POST['idsolicitud'],1);

    $query = "call sp_gastoscomprobarfactura_all($pidgastoscomprobar);";

    $result = $bd->query($query);
    
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idgastoscomprobarfactura' => $row['idgastoscomprobarfactura'],
                'tipocomprobante' => $row['tipocomprobante'],
                'foliocomprobante' => $row['foliocomprobante'],
                'fecha' => $row['fecha'],
                'proveedor' => $row['proveedor'],
                'importetotal' => $row['importetotal'],
                'nombrearchivoxml' => $row['nombrearchivoxml'],
                'nombrearchivopdf' => $row['nombrearchivopdf']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>