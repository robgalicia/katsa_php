<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "call sp_vehiculotenencia_all($id_vehiculo)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idvehiculotenencia' => $row['idvehiculotenencia'],
                'fechapago' => $row['fechapago'],
                'foliotarjeta' => $row['foliotarjeta'],
                'importepagado' => $row['importepagado'],
                'fechavigencia' => $row['fechavigencia'],
                'placas' => $row['placas']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>