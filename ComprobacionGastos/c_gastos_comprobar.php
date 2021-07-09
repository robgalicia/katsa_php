<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }   

    $arrayTodo = array();
    
    $pidgastoscomprobar = $_POST['id'];
    $quien =  form2insert($_SESSION["nombre"],0);

    $query = '';
    $result = '';
    $status = '';

    $query = "call sp_gastoscomprobar_comprobado($pidgastoscomprobar,$quien)";
    $result = $bd->query($query);


    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>