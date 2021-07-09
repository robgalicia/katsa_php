<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $semana = $_POST['semana'];
    
    $query = "call sp_rptvehiculogasolina_resconsumo('$semana')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'semana' => $row['semana'],                
                'tarjeta' => $row['tarjeta'],
                'responsable' => $row['responsable'],
                'litros' => $row['litros'],
                'importe' => $row['importe']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>