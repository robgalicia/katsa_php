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
    
    $pidtraslado = form2insert($_POST['idtraslado'],1);
    $ptiposervicio = form2insert($_POST['tiposervicio'],0);
    $pidhojatraslado = form2insert($_POST['idhojatraslado'],1);
    $pnumhojatraslado = form2insert($_POST['numhojatraslado'],1);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_hojatraslado_ups(
        $pidhojatraslado,
        $pidtraslado,
        $pnumhojatraslado,
        $ptiposervicio,
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