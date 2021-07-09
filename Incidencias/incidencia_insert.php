<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();

    $movil = true;
    
    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $idempleado = form2insert($_POST['idempleado'],1);
    $tipo_inc = form2insert($_POST['tipo_inc'],1);
    $fecha_inc = form2insert($_POST['fecha_inc'],0);    
    $idempleadoautoriza = form2insert($_POST['idempleadoautoriza'],1);
    $observaciones = form2insert($_POST['observaciones'],0);

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_empleadoincidencia_ins(
        $idempleado,
        $tipo_inc,
        $fecha_inc,
        $idempleadoautoriza,
        $observaciones,
        $quien,
        @last_id
    )";

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>