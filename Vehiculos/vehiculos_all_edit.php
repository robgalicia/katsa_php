<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idvehiculo = $_POST["idvehiculo"];

    $query = "call sp_vehiculo_sel($idvehiculo);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idvehiculo' => $row['idvehiculo'],                
                'idmarcavehiculo' => $row['idmarcavehiculo'],
                'descmarcavehiculo' => $row['descmarcavehiculo'],
                'submarca' => $row['submarca'],
                'aniomodelo' => $row['aniomodelo'],
                'placas' => $row['placas'],
                'idcolor' => $row['idcolor'],
                'desccolor' => $row['desccolor'],
                'cilindros' => $row['cilindros'],
                'numserie' => $row['numserie'],
                'nummotor' => $row['nummotor'],
                'tipotransmision' => $row['tipotransmision'],
                'idtipocombustible' => $row['idtipocombustible'],
                'desctipocombustible' => $row['desctipocombustible'],
                'capacidadtanque' => $row['capacidadtanque'],
                'numeconomico' => $row['numeconomico'],
                'tarjetacombustible' => $row['tarjetacombustible'],
                'regionactual' => $row['regionactual'],
                'adscripcionactual' => $row['adscripcionactual'],
                'nombrecliente' => $row['nombrecliente'], 
                'empleadoresguardo' => $row['empleadoresguardo'],
                'esarrendado' => $row['esarrendado'], 
                'idarrendadora' => $row['idarrendadora'],
                'empresa' => $row['empresa'], 
                'kilometrajeactual' => $row['kilometrajeactual'],
                'fechakilometraje' => $row['fechakilometraje'],
                'kilometrajemtto' => $row['kilometrajemtto'],
                'fechaultimomtto' => $row['fechaultimomtto'],
                'estatus' => $row['estatus'],
                'fechabaja' => $row['fechabaja'],
                'tienegps' => $row['tienegps'],
                'proveedorgps' => $row['proveedorgps'],
                'motivobaja' => $row['motivobaja'],
                'observaciones' => $row['observaciones']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>