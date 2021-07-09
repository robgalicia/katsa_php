<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
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

    $pidgastoscomprobar = form2insert($_POST['pidgastoscomprobar'],1);
    $pcomentarios = form2insert($_POST['pcomentarios'],0);


    $query = "call sp_gastoscomprobar_conciliado($pidgastoscomprobar,$pcomentarios,$quien);";
    //echo $query;
    $result = $bd->query($query);

    //echo $result;
    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => true
    );

    echo json_encode($arraySingle);
?>