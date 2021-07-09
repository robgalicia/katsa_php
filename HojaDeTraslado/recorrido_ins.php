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
    
    $pidhojatraslado = form2insert($_POST['id'],1);
    $pfecharecorrido = form2insert($_POST['fecharecorrido'],0);
    $phorasalida = form2insert($_POST['horasalida'],0);
    $phorallegada = form2insert($_POST['horallegada'],0);
    $pvehiculo = form2insert($_POST['vehiculo'],0);
    $pplacas = form2insert($_POST['placas'],0);
    $pempresavehiculo = form2insert($_POST['empresavehiculo'],0);
    $poperador = form2insert($_POST['operador'],0);
    $precorrido = form2insert($_POST['recorrido'],0);
    $pobservaciones = form2insert($_POST['observaciones'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_trasladorecorrido_ins(
        $pidhojatraslado,
        $pfecharecorrido,
        $phorasalida,
        $phorallegada,
        $pvehiculo,
        $pplacas,
        $pempresavehiculo,
        $poperador,
        $precorrido,
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