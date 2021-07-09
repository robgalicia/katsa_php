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
    
    $idingeniero = form2insert($_POST['idingeniero'],1);
    $nombre = form2insert($_POST['nombre'],0);
    $cliente = form2insert($_POST['cliente'],1);
    $subcontrata = form2insert($_POST['subcontrata'],1);
    $activo = form2insert($_POST['activo'],1);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_ingeniero_ups(
        $idingeniero,
        $nombre,
        $cliente,
        $subcontrata,
        $activo,
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