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
    
    $empleado = $_POST['empleado'];

    $query = "call sp_empleadoadscripcion_all($empleado)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idempleadoadscripcion' => $row['idempleadoadscripcion'],
                'fechaadscripcion' => $row['fechaadscripcion'],
                'idregion' => $row['idregion'],
                'descregion' => $row['descregion'],
                'idadscripcion' => $row['idadscripcion'],
                'descadscripcion' => $row['descadscripcion'],
                'idcliente' => $row['idcliente'],
                'nombrecliente' => $row['nombrecliente'],
                'idpuesto' => $row['idpuesto'],                
                //'nombrearchivofirmado' => $row['nombrearchivofirmado'],                
                'idformatolegal' => $row['idformatolegal'],                
                'descpuesto' => $row['descpuesto']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>