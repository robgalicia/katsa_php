<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidordenservicio  = form2insert($_POST['idordenservicio'],1);

    $query = "call sp_ordenserviciopuesto_all($pidordenservicio);";
    //echo $query;
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idordenserviciopuesto' => $row['idordenserviciopuesto'],
                'idordenservicio' => $row['idordenservicio'],
                'idpuesto' => $row['idpuesto'],
                'puesto' => $row['descpuesto'],
                'cantidad' => $row['cantidad']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>