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
    
    $pidpuesto = form2insert($_POST['pidpuesto'],1);
    $pidentregable = form2insert($_POST['pidentregable'],1);
    $pcantidadentregable = form2insert($_POST['pcantidadentregable'],1);
    $pfechaini = form2insert($_POST['pfechaini'],0);
    $pfechafin = form2insert($_POST['pfechafin'],0);
    $pTipoEvento = form2insert($_POST['pTipoEvento'],0);
    $pOpcionRepetirEvento = form2insert($_POST['pOpcionRepetirEvento'],1);
    $pDomingo = form2insert($_POST['pDomingo'],1);
    $pLunes = form2insert($_POST['pLunes'],1);
    $pMartes = form2insert($_POST['pMartes'],1);
    $pMiercoles = form2insert($_POST['pMiercoles'],1);
    $pJueves = form2insert($_POST['pJueves'],1);
    $pViernes = form2insert($_POST['pViernes'],1);
    $pSabado = form2insert($_POST['pSabado'],1);
    $pCadaMes = form2insert($_POST['pCadaMes'],1);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_agendaentregable_ins(
        $pidpuesto,
        $pidentregable,
        $pcantidadentregable,
        $pfechaini,
        $pfechafin,
        $pTipoEvento,
        $pOpcionRepetirEvento,
        $pDomingo,
        $pLunes,
        $pMartes,
        $pMiercoles,
        $pJueves,
        $pViernes,
        $pSabado,
        $pCadaMes,
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