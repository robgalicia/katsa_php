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
    
    $pidagendaentregable = form2insert($_POST['pidagendaentregable'],1);
    $pfechacompromiso = form2insert($_POST['pfechacompromiso'],0);
    $pcantidadentregable = form2insert($_POST['pcantidadentregable'],1);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_agendaentregable_upd(
        $pidagendaentregable,
        $pcantidadentregable,
        $pfechacompromiso,
        $quien
    )";

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>