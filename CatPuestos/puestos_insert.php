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
    
    $pidpuesto = form2insert($_POST['idpuesto'],1);
    $pdescpuesto = form2insert($_POST['desc'],0);
    $ptipopuesto = form2insert($_POST['tipopuesto'],0);
    $pdescfunciones = form2insert($_POST['funciones'],0);

    $departamento = form2insert($_POST['departamento'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_puesto_ups(
        $pidpuesto,
        $pdescpuesto,
        $ptipopuesto,
        $pdescfunciones,
        $departamento,
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