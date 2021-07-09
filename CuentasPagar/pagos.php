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
    
    $pidordencomprafactura = $_POST['id'];
    $pfechapagoprogramado =  form2insert($_POST["fecha_programado"],0);
    $quien =  form2insert($_SESSION["nombre"],0);

    $query = '';
    $result = '';
    $status = '';

    $query = "call sp_ordencomprafactura_updprogramarpago($pidordencomprafactura,$pfechapagoprogramado, $quien)";
    $result = $bd->query($query);


    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>