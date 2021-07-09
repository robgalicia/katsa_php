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
    
    $pidgastoscomprobardetalle = form2insert($_POST['idgastoscomprobardetalle'],1);
    $pcantidadautoriza = form2insert($_POST['cantidadautoriza'],1);
    $pimporteautoriza = form2insert($_POST['importeautoriza'],1);
    $ptotalautoriza = form2insert($_POST['totalautoriza'],1);

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();

    $query = "call sp_gastoscomprobardetalle_upd(
        $pidgastoscomprobardetalle,
        $pcantidadautoriza,
        $pimporteautoriza,
        $ptotalautoriza,
        $quien
    )";    
    //echo $query;
    $last = -1;

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);

    

?>