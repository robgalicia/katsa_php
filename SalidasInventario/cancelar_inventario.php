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

    $idsalida = form2insert($_POST['id'],1);
    $idempleadocancela = $_SESSION['idempleado'];
    $motivo = form2insert($_POST['motivo'],0);

    $query = "call sp_salidainventario_cancela($idsalida,$idempleadocancela,$motivo,$quien);";

    $result = $bd->query($query);

    //echo $result;
    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => true
    );

    echo json_encode($arraySingle);
?>