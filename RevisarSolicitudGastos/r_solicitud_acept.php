<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    include ("../Comun/mail_to_autorizar.php");

    $bd = new Conexion();

    $movil = true;
    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    } 

    $arrayTodo = array();    
    $quien = '';
    $idempleado = 0;
    if($movil){
        $quien = form2insert($_POST["quien"],0);
        $idempleado = $_POST['idempleado'];
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
        $idempleado = $_SESSION['idempleado'];
    }

    $idsolicitud = form2insert($_POST['idsolicitud'],1);
    

    $query = "call sp_gastoscomprobar_revisa($idsolicitud,$idempleado,$quien);";

    $result = $bd->query($query);

    $se_envio = '';

    if($result){
        /*
            Funcion que manda un mail para revisar o autorizar una solicitud
            solicitud -> 'R' = Requisicion, 'V' = Viaticos
            accion -> 'R' = Revisa, 'A' = Autoriza
        */
        //$se_envio = correo_autorizar($idsolicitud,'V','R');
    }
    //echo $result;
    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'se_envio' => $se_envio,
        'result' => true
    );

    echo json_encode($arraySingle);
?>