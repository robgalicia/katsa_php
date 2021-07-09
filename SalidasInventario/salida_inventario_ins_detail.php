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

    $pidsalidainventario = form2insert($_POST['pidsalidainventario'],1);
    $pidarticulo = form2insert($_POST['pidarticulo'],1);
    $pcantidad = form2insert($_POST['pcantidad'],1);
    $pcostounitario = form2insert($_POST['pcostounitario'],1);
    $pcostototal = form2insert($_POST['pcostototal'],1);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_salidainventariodetalle_ins(
        $pidsalidainventario,
        $pidarticulo,
        $pcantidad,
        $pcostounitario,
        $pcostototal,
        $quien,
        @last_id
    )";
    
    $last = -1;

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,        
        'result' => $result
    );

    echo json_encode($arraySingle);

    

?>