<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();
    
    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "call sp_vehiculomantenimiento_sel($id_vehiculo)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'idvehiculomantenimiento' => $row['idvehiculomantenimiento'],
                'fecha' => $row['fecha'],
                'kilometrajeactual' => $row['kilometrajeactual'],
                'descservicio' => $row['descservicio'],
                'idproveedor' => $row['idproveedor'],
                'importetotal' => $row['importetotal'],
                'observaciones' => $row['observaciones'],
                'subtotal' => $row['subtotal'],
                'iva' => $row['iva'],
                'idempleadocomision' => $row['idempleadocomision'],
                'kmsproxmantenimiento' => $row['kmsproxmantenimiento'],
                'fechapago' => $row['fechapago'],
                'referenciapago' => $row['referenciapago']               
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>