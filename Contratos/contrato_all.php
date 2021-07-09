<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $empleado = $_POST['empleado'];

    $query = "call sp_empleadocontrato_all($empleado)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'consecutivo' => $row['consecutivo'],
                'idempleadocontrato' => $row['idempleadocontrato'],                
                'nombrecompleto' => $row['nombrecompleto'],
                'fechaingreso' => $row['fechaingreso'],
                'fechacontrato' => $row['fechacontrato'], 
                'diascontrato' => $row['diascontrato'],
                'fechainicial' => $row['fechainicial'],
                'fechafinal' => $row['fechafinal'],

                'periodocontrato' => $row['periodocontrato'],                

                'idformatolegal' => $row['idformatolegal'],

                //'nombrearchivofirmado' => $row['nombrearchivofirmado'],

                'sueldonetomensual' => $row['sueldonetomensual']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>