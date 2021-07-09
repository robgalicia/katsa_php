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
    $pfechalimitecomprobacion = form2insert($_POST['pfechalimitecomprobacion'],0);
    $pidcuentabancaria = form2insert($_POST['pidcuentabancaria'],1);
    $preferenciaentrega = form2insert($_POST['preferenciaentrega'],0);
    $pcentrocostos = form2insert($_POST['pcentrocostos'],1);


    $query = "call sp_gastoscomprobar_entrega($pidgastoscomprobar,$pfechalimitecomprobacion,$pidcuentabancaria,$preferenciaentrega,$pcentrocostos,$quien);";
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