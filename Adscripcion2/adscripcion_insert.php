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

    $idadscripcion = form2insert($_POST['idadscripcion'],1);
    $descadscripcion = form2insert($_POST['descadscripcion'],0);
    $idregion = form2insert($_POST['idregion'],0);
    $ubicacion = form2insert($_POST['ubicacion'],0);
    $fechainicio = form2insert($_POST['fechainicio'],0);
    $fechabaja = form2insert($_POST['fechabaja'],0);
    $calle = form2insert($_POST['calle'],0);
    $numexterior = form2insert($_POST['numexterior'],1);
    $numinterior = form2insert($_POST['numinterior'],1);
    $entrecalle = form2insert($_POST['entrecalle'],0);
    $ylacalle = form2insert($_POST['ylacalle'],0);
    $colonia = form2insert($_POST['colonia'],0);
    $codigopostal = form2insert($_POST['codigopostal'],1);
    $ciudad = form2insert($_POST['ciudad'],0);
    $idmunicipio = form2insert($_POST['idmunicipio'],1);
    $idestado = form2insert($_POST['idestado'],1);
    $personacontacto = form2insert($_POST['personacontacto'],0);
    $telefonocontacto = form2insert($_POST['telefonocontacto'],0);
    $correoelectronico = form2insert($_POST['correoelectronico'],0);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_adscripcion_ups(
        $idadscripcion,
        $descadscripcion,
        $idregion,
        $ubicacion,
        $fechainicio,
        $fechabaja,
        $calle,
        $numexterior,
        $numinterior,
        $entrecalle,
        $ylacalle,
        $colonia,
        $codigopostal,
        $ciudad,
        $idmunicipio,
        $idestado,
        $personacontacto,
        $telefonocontacto,
        $correoelectronico,
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