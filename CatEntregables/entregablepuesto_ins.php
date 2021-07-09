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
    
    $pidentregable = form2insert($_POST['identregable'],1);
    $pidpuesto = form2insert($_POST['idpuesto'],1);


    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_entregablepuesto_ins(
        $pidentregable,
        $pidpuesto,
        $quien,
        @last_id
    )";
    //echo $query;
    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>