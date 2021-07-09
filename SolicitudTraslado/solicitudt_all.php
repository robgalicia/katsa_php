<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $panio = form2insert($_POST['anio'],1);
    $pmes = form2insert($_POST['mes'],1);

    $query = "call sp_traslado_all($panio,$pmes);";
    #echo $query;
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idtraslado' => $row['idtraslado'],
                'folio' => $row['folio'],
                'fechaservicio' => $row['fechaservicio'],
                'solicitante' => $row['solicitante'],
                'empresa' => $row['empresa'],
                'tiposervicio' => $row['tiposervicio'],
                'descrutatraslado' => $row['descrutatraslado'],
                'fechacierre' => $row['fechacierre']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>