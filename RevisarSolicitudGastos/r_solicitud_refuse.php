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

    $arrayTodo = array();    
    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $idsolicitud = form2insert($_POST['idsolicitud'],1);

    $query = "call sp_gastoscomprobar_rechazado($idsolicitud,$quien);";

    $result = $bd->query($query);

    //echo $result;
    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => true
    );

    echo json_encode($arraySingle);
?>