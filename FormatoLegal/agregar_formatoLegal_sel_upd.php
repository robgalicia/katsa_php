<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();
    
    $id = $_POST["idReporte"];

    $query = "call sp_formatolegal_sel($id)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        
            
            $arraySingle = array(
                'idformatolegal' => $row['idformatolegal'],
                'claveformato' => $row['claveformato'],
                'nombreformatolegal' => $row['nombreformatolegal'],                
                'contenido' => $row['contenido'],                

                'margensuperior' => $row['margensuperior'],
                'margeninferior' => $row['margeninferior'],
                'margenizquierdo' => $row['margenizquierdo'],
                'margenderecho' => $row['margenderecho'],
                'storeprocedure' => $row['storeprocedure']
            );

            $arrayTodo[] = $arraySingle;            
        }        

        echo json_encode($arrayTodo);
    }
?>