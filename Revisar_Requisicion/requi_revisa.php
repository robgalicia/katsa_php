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

    $quien = '';
    $idempleado = 0;
    if($movil){
        $quien = form2insert($_POST["quien"],0);
        $idempleado = $_POST['idempleado'];
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
        $idempleado = $_SESSION['idempleado'];
    }

    $pidrequisicion = form2insert($_POST['idrequi'],1);

    $idregion = form2insert($_POST['idregion'],1);
    $iddepartamento = form2insert($_POST['iddepartamento'],1);

    $arrayTodo = array();

    $query = "call sp_requisicion_revisa(
        $pidrequisicion,
        $idempleado,
        $quien
    )";

    $result = $bd->query($query);

    $se_envio = '';

    if($result){
        /*
            Funcion que manda un mail para revisar o autorizar una solicitud
            solicitud -> 'R' = Requisicion, 'V' = Viaticos
            accion -> 'R' = Revisa, 'A' = Autoriza
        */
        //$se_envio = correo_autorizar($pidrequisicion,'R','A');
    }

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>