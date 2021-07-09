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
    
    $idcliente = form2insert($_POST['idcliente'],1);
    $idclienteservicio = form2insert($_POST['idclienteservicio'],1);

    $idservicio = form2insert($_POST['idservicio'],1);
    $descripcioncorta = form2insert($_POST['desc'],0);
    $descservicio = form2insert($_POST['desc_detallada'],0);
    $preciounitario = form2insert($_POST['precio'],1);
    $idtipomoneda = form2insert($_POST['moneda'],1);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_clienteservicio_ups(
        $idclienteservicio,
        $idcliente,        
        $idservicio,
        $descripcioncorta,
        $descservicio,
        $preciounitario,
        $idtipomoneda,
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