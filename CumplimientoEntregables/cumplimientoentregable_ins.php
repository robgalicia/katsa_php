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
    
    $pidagendaentregable = form2insert($_POST['idagendaentregable'],1);
    $pfechaentrega = form2insert($_POST['fechaentrega'],0);
    $pcantidadentregada    = form2insert($_POST['cantidadentregada'],1);
    $pidempleadoentrega  = ($_SESSION["idempleado"]);
    $pobservaciones  = form2insert($_POST['observaciones'],0);


    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_cumplimientoentregable_ins(
        $pidagendaentregable,
        $pfechaentrega,
        $pcantidadentregada,
        $pidempleadoentrega,
        $pobservaciones,
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