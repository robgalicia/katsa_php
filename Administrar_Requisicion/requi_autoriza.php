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

    $pidrequisicion = form2insert($_POST['idrequi'],1);
    $idempleado = $_SESSION['idempleado'];
    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();


    $query = "call sp_requisicion_autoriza(
        $pidrequisicion,
        $idempleado,
        $quien
    )";

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>