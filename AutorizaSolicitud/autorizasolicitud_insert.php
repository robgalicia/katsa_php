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
    
    $idautorizasolicitud = form2insert($_POST['idautorizasolicitud'],1);
    $idregion = form2insert($_POST['idregion'],1);
    $idempleadorevisa = form2insert($_POST['idempleadorevisa'],1);
    $iddepartamento = form2insert($_POST['iddepartamento'],1);
    $idempleadoautoriza = form2insert($_POST['idempleadoautoriza'],1);
    $tiposolicitud = form2insert($_POST['tiposolicitud'],0);


    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_autorizasolicitud_ups(
        $idautorizasolicitud,
        $tiposolicitud,
        $idregion,
        $iddepartamento,
        $idempleadorevisa,        
        $idempleadoautoriza,        
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