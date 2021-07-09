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
    $pfechapagado =  form2insert($_POST["fecha_pago"],0);
    $pidformapagado =  form2insert($_POST["idformapago"],1);
    $preferenciapagado =  form2insert($_POST["referencia"],0);
    $pobservacionespagado =  form2insert($_POST["observaciones"],0);
    $quien =  form2insert($_SESSION["nombre"],0);

    $query = '';
    $result = '';
    $status = '';

    $query = "call sp_ordencomprafactura_updaplicarpago($pidordencomprafactura,$pfechapagado,$pidformapagado,$preferenciapagado,$pobservacionespagado, $quien)";
    $result = $bd->query($query);


    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>