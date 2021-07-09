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
    
    $pidentregable = form2insert($_POST['identregable'],1);
    $piddepartamento = form2insert($_POST['iddepartamento'],1);
    $pidcategoria = form2insert($_POST['idcategoria'],1);
    $pdescentregable = form2insert($_POST['descentregable'],0);


    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_entregable_ups(
        $pidentregable,
        $piddepartamento,
        $pidcategoria,
        $pdescentregable,
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