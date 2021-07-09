<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idempleadoreferencia = form2insert($_POST['idempleadoreferencia'],1);
    $idempleado = form2insert($_POST['idempleado'],1);
    $idtipoparentesco = form2insert($_POST['idtipoparentesco'],0);
    $nombre = form2insert($_POST['nombre'],0);
    $domicilio = form2insert($_POST['domicilio'],0);
    $colonia = form2insert($_POST['colonia'],0);
    $ciudad = form2insert($_POST['ciudad'],0);
    $idestado = form2insert($_POST['idestado'],1);
    $telefono = form2insert($_POST['telefono'],0);
    $correoelectronico = form2insert($_POST['correoelectronico'],0);
    $fechanacimiento = form2insert($_POST['fechanacimiento'],0);
    $esbeneficiario = form2insert($_POST['esbeneficiario'],0);

    $rfc = form2insert($_POST['rfc'],0);
    $curp = form2insert($_POST['curp'],0);

    $porcentaje = form2insert($_POST['porcentaje'],1);

    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();

    $query = "call sp_empleadoreferencia_ups(
        $idempleadoreferencia,
        $idempleado,
        $idtipoparentesco,
        $nombre,
        $domicilio,
        $colonia,
        $ciudad,
        $idestado,
        $telefono,
        $correoelectronico,
        $fechanacimiento,
        $esbeneficiario,
        $porcentaje,
        $quien,
        $rfc,
        $curp,
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