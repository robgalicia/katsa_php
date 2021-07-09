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
    
    $pidadscripcion = form2insert($_POST['idadscripcion'],1);
    $pdescadscripcion = form2insert($_POST['descadscripcion'],0);
    $pidregion = form2insert($_POST['idregion'],1);
    $pubicacion = form2insert($_POST['ubicacion'],0);
    $pfechainicio = form2insert($_POST['fechaini'],0);
    $pfechabaja = form2insert($_POST['fechabaja'],0);
    $pcalle = form2insert($_POST['calle'],0);
    $pnumexterior = form2insert($_POST['numext'],0);
    $pnuminterior = form2insert($_POST['numint'],0);
    $pentrecalle = form2insert($_POST['entrecalle'],0);
    $pylacalle = form2insert($_POST['ycalle'],0);
    $pcolonia = form2insert($_POST['colonia'],0);
    $pcodigopostal = form2insert($_POST['cp'],1);
    $pciudad = form2insert($_POST['ciudad'],0);
    $pidmunicipio = form2insert($_POST['idmunicipio'],1);
    $pidestado = form2insert($_POST['idestado'],1);
    $ppersonacontacto = form2insert($_POST['personacontacto'],0);
    $ptelefonocontacto = form2insert($_POST['telefono'],0);
    $pcorreoelectronico = form2insert($_POST['correo'],0);
    $pdistanciakms = form2insert($_POST['kms'],1);


    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_adscripcion_ups(
        $pidadscripcion,
        $pdescadscripcion,
        $pidregion,
        $pubicacion,
        $pfechainicio,
        $pfechabaja,
        $pcalle,
        $pnumexterior,
        $pnuminterior,
        $pentrecalle,
        $pylacalle,
        $pcolonia,
        $pcodigopostal,
        $pciudad,
        $pidmunicipio,
        $pidestado,
        $ppersonacontacto,
        $ptelefonocontacto,
        $pcorreoelectronico,
        $pdistanciakms,
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