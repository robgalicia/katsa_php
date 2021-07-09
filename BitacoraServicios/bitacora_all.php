<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pfechainicial  = form2insert($_POST['fecha_ini'],0);
    $pfechafinal  = form2insert($_POST['fecha_fin'],0);
    $pidestatus  = form2insert($_POST['idestatus'],1);
    $pfolio  = form2insert($_POST['folio'],1);

    $query = "call sp_ordenservicio_all($pfechainicial,$pfechafinal,$pidestatus,$pfolio);";
    //echo $query;
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'folio' => $row['folio'],
                'idordenservicio' => $row['idordenservicio'],
                'fechainicio' => $row['fechainicio'],
                'descregion' => $row['descregion'],
                'nombrecliente' => $row['nombrecliente'],
                'servicio' => $row['servicio'],
                'lugarservicio' => $row['lugarservicio'],
                'descestatus' => $row['descestatus']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>