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
        
    $idordencompraclientedetalle = form2insert($_POST['idordencompraclientedetalle'],1);
    $idordencompracliente = form2insert($_POST['idordencompracliente'],1);
    $item = form2insert($_POST['item'],1);
    $idservicio = form2insert($_POST['idservicio'],1);
    $descservicio = form2insert($_POST['descservicio'],0);
    $cantidad = form2insert($_POST['cantidad'],1);
    $preciounitario = form2insert($_POST['preciounitario'],1);
    $importetotal = form2insert($_POST['importetotal'],1);

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_ordencompraclientedetalle_ups(
        $idordencompraclientedetalle,
        $idordencompracliente,
        $item,
        $idservicio,
        $descservicio,
        $cantidad,
        $preciounitario,
        $importetotal,
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