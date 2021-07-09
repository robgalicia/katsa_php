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
    
    $idordendetalle = form2insert($_POST['idordendetalle'],1);    
    $cantidad = form2insert($_POST['cantidad'],1);
    $importe = form2insert($_POST['importe'],1);
    $total = form2insert($_POST['total'],1);    

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_ordencompradetalle_upd(
        $idordendetalle,        
        $cantidad,
        $importe,
        $total,        
        $quien
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