<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidordenservicio = form2insert($_POST['idordenservicio'],1);

    $query = "call sp_actaservicio_all($pidordenservicio);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idactaservicio' => $row['idactaservicio'],
                'idordenservicio' => $row['idordenservicio'],
                'numeroacta' => $row['numeroacta'],
                'fechaacta' => $row['fechaacta'],
                'observaciones' => $row['observaciones'],
                'tipoacta' => $row['tipoacta']

            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>