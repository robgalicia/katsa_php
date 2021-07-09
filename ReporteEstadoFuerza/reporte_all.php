<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $estatus = $_POST['estatus'];
    
    $query = "call sp_vehiculo_edofuerza($estatus);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'municipio' => $row['municipio'],
                'cliente' => $row['cliente'],
                'sitio' => $row['sitio'],
                'nombreempleado' => $row['nombreempleado'],
                'tarjetacombustible' => $row['tarjetacombustible'],
                'marcasubmarca' => $row['marcasubmarca'],
                'placas' => $row['placas'],
                'modelo' => $row['modelo'], 
                'propietario' => $row['propietario'],
                'numeconomico' => $row['numeconomico'],
                'capacidadtanque' => $row['capacidadtanque'],
                'estatus' => $row['estatus']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>