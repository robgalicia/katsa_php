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
    
    $pidcuentabancaria = form2insert($_POST['idcuentabancaria'],1);    
    $pidbanco = form2insert($_POST['descbanco'],1);
    $pnumerocuenta = form2insert($_POST['numerocuenta'],0);
    $pclabeinterbancaria = form2insert($_POST['clabeinterbancaria'],0);
    $pcuentacontable = form2insert($_POST['cuentacontable'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_cuentabancaria_ups(
        $pidcuentabancaria,
        $pidbanco,
        $pnumerocuenta,
        $pclabeinterbancaria,
        $pcuentacontable,
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