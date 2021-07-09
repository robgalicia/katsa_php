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
    
    $pidrutatraslado = form2insert($_POST['idrutatraslado'],1);
    $pdescrutatraslado = form2insert($_POST['descrutatraslado'],0);
    $pimportetarifa = form2insert($_POST['importetarifa'],1);
    $pidtipomoneda = form2insert($_POST['idtipomoneda'],1);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_rutatraslado_ups(
        $pidrutatraslado,
        $pdescrutatraslado,
        $pimportetarifa,
        $pidtipomoneda,
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