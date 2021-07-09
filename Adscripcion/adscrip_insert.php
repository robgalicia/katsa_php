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
    $fechaadscripcion = form2insert($_POST['fechaadscripcion'],0);
    $idregion = form2insert($_POST['idregion'],1);
    $idadscripcion = form2insert($_POST['idadscripcion'],1);
    $idcliente = form2insert($_POST['idcliente'],1);
    $idpuesto = form2insert($_POST['idpuesto'],1);
    $idempleadoautoriza = form2insert($_POST['idempleadoautoriza'],1);

    $observaciones = form2insert($_POST['observaciones'],0);

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_empleadoadscripcion_ins(
        $idempleado,
        $fechaadscripcion,
        $idregion,
        $idadscripcion,
        $idcliente,
        $idpuesto,
        $idempleadoautoriza,
        now(),
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