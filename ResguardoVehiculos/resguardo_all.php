<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();    

    $movil = true;

    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();
    
    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "call sp_vehiculoresguardo_all($id_vehiculo)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idvehiculoresguardo' => $row['idvehiculoresguardo'],
                'fecharesguardo' => $row['fecharesguardo'], 
                'tiporesguardo' => $row['tiporesguardo'],
                'placas' => $row['placas'],
                'marcavehiculo' => $row['marcavehiculo'],
                'aniomodelo' => $row['aniomodelo'],
                'numeconomico' => $row['numeconomico'],
                'empleadoresguardo' => $row['empleadoresguardo'],
                'nombrecliente' => $row['nombrecliente'],                
                'descadscripcion' => $row['descadscripcion']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>