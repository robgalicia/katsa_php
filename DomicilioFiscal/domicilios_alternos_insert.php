<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idclientedomiciliofiscal = form2insert($_POST['idclientedomiciliofiscal'],1);
    $idcliente = form2insert($_POST['idcliente'],1);
    $nombre = form2insert($_POST['nombre'],0);
    $nombrecomercial = form2insert($_POST['nombrecomercial'],0);
    $calle = form2insert($_POST['calle'],0);
    $numexterior = form2insert($_POST['numexterior'],0);
    $numinterior = form2insert($_POST['numinterior'],0);
    $colonia = form2insert($_POST['colonia'],0);
    $ciudad = form2insert($_POST['ciudad'],0);
    $idmunicipio = form2insert($_POST['idmunicipio'],1);
    $idestado = form2insert($_POST['idestado'],1);
    $codigopostal = form2insert($_POST['codigopostal'],1);
    $rfc = form2insert($_POST['rfc'],0);
    $personacontacto = form2insert($_POST['personacontacto'],0);
    $telefonocontacto = form2insert($_POST['telefonocontacto'],0);
    $correoelectronico = form2insert($_POST['correoelectronico'],0);
    $cveusocfdi = form2insert($_POST['cveusocfdi'],0);

    $porcentajeiva = form2insert($_POST['porcentajeiva'],1);

    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();

    $query = "call sp_clientedomiciliofiscal_ups(
        $idclientedomiciliofiscal,
        $idcliente,
        $nombre,
        $nombrecomercial,
        $calle,
        $numexterior,
        $numinterior,
        $colonia,
        $ciudad,
        $idmunicipio,
        $idestado,
        $codigopostal,
        $rfc,
        $personacontacto,
        $telefonocontacto,
        $correoelectronico,
        $cveusocfdi,
        $porcentajeiva,
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