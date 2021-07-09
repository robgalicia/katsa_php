<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idempleado = form2insert($_POST['idempleado'],1);
    $apellidopaterno = form2insert($_POST['apellidopaterno'],0);
    $apellidomaterno = form2insert($_POST['apellidomaterno'],0);
    $nombre = form2insert($_POST['nombre'],0);
    $sexo = form2insert($_POST['sexo'],0);
    $rfc = form2insert($_POST['rfc'],0);
    $curp = form2insert($_POST['curp'],0);
    $cuip = form2insert($_POST['cuip'],0);
    $numcartilla = form2insert($_POST['numcartilla'],0);
    $calle = form2insert($_POST['calle'],0);
    $numexterior = form2insert($_POST['numexterior'],0);
    $numinterior = form2insert($_POST['numinterior'],0);
    $entrecalles = form2insert($_POST['entrecalles'],0);
    $colonia = form2insert($_POST['colonia'],0);
    $ciudad = form2insert($_POST['ciudad'],0);
    $idmunicipio = form2insert($_POST['idmunicipio'],1);
    $idestado = form2insert($_POST['idestado'],1);
    $codigopostal = form2insert($_POST['codigopostal'],1);
    $telefonocasa = form2insert($_POST['telefonocasa'],0);
    $telefonocelular = form2insert($_POST['telefonocelular'],0);
    $correoelectronico = form2insert($_POST['correoelectronico'],0);
    $idestadocivil = form2insert($_POST['idestadocivil'],1);
    $nombreconyuge = form2insert($_POST['nombreconyuge'],0);
    $idtiposangre = form2insert($_POST['idtiposangre'],1);
    $idnacionalidad = form2insert($_POST['idnacionalidad'],1);
    $lugarnacimiento = form2insert($_POST['lugarnacimiento'],0);
    $fechanacimiento = form2insert($_POST['fechanacimiento'],0);
    $idgradoescolaridad = form2insert($_POST['idgradoescolaridad'],1);
    $documentoescolaridad = form2insert($_POST['documentoescolaridad'],0);
    $aniodocumentoescolaridad = form2insert($_POST['aniodocumentoescolaridad'],0);
    $idprofesion = form2insert($_POST['idprofesion'],1);
    $iddepartamento = form2insert($_POST['iddepartamento'],1);
    $idpuestotabulador = form2insert($_POST['idpuestotabulador'],1);
    $idpuestoorganigrama = form2insert($_POST['idpuestoorganigrama'],1);
    $idpuestoregistro = form2insert($_POST['idpuestoregistro'],1);
    $idregionactual = form2insert($_POST['idregionactual'],1);
    $idadscripcionactual = form2insert($_POST['idadscripcionactual'],1);
    $fechaingreso = form2insert($_POST['fechaingreso'],0);
    $fechareingreso = form2insert($_POST['fechareingreso'],0);
    $fechabaja = form2insert($_POST['fechabaja'],0);
    $motivobaja = form2insert($_POST['motivobaja'],0);
    $nombreemergencia = form2insert($_POST['nombreemergencia'],0);
    $telefonoemergencia = form2insert($_POST['telefonoemergencia'],0);
    $correoemergencia = form2insert($_POST['correoemergencia'],0);
    $numimss = form2insert($_POST['numimss'],0);
    $sueldonetomensual = form2insert($_POST['sueldonetomensual'],0);
    $sueldodiarioimss = form2insert($_POST['sueldodiarioimss'],0);
    $idbanco = form2insert($_POST['idbanco'],1);
    $numcuenta = form2insert($_POST['numcuenta'],0);
    $clabe = form2insert($_POST['clabe'],0);
    $tarjetadebito = form2insert($_POST['tarjetadebito'],0);
    $numcreditoinfonavit = form2insert($_POST['numcreditoinfonavit'],0);
    $fechacreditoinfonavit = form2insert($_POST['fechacreditoinfonavit'],0);
    $tipocreditoinfonavit = form2insert($_POST['tipocreditoinfonavit'],0);
    $descuentoinfonavit = form2insert($_POST['descuentoinfonavit'],0);
    $tallacamisa = form2insert($_POST['tallacamisa'],0);
    $tallapantalon = form2insert($_POST['tallapantalon'],0);
    $tallazapatos = form2insert($_POST['tallazapatos'],0);
    $tallachamarra = form2insert($_POST['tallachamarra'],0);
    $capbasica = form2insert($_POST['capbasica'],0);
    $capseginmuebles = form2insert($_POST['capseginmuebles'],0);
    $capmanejodefensivo = form2insert($_POST['capmanejodefensivo'],0);
    $capprimerosauxilios = form2insert($_POST['capprimerosauxilios'],0);
    $requiereregsnsp = form2insert($_POST['requiereregsnsp'],0);
    $idestatusregsnsp = form2insert($_POST['idestatusregsnsp'],1);
    $outsourcing = form2insert($_POST['outsourcing'],0);
    $idempresaoutsourcing = form2insert($_POST['idempresaoutsourcing'],1);
    $numempleado = form2insert($_POST['numempleado'],1);

    $idcliente = form2insert($_POST['idcliente'],1);

    $quien = form2insert($_SESSION["nombre"],0);

    $arrayTodo = array();

    $query = "call sp_empleado_ups(
        $idempleado,
        $apellidopaterno,
        $apellidomaterno,
        $nombre,
        $sexo,
        $rfc,
        $curp,
        $cuip,
        $numcartilla,
        $calle,
        $numexterior,
        $numinterior,
        $entrecalles,
        $colonia,
        $ciudad,
        $idmunicipio,
        $idestado,
        $codigopostal,
        $telefonocasa,
        $telefonocelular,
        $correoelectronico,
        $idestadocivil,
        $nombreconyuge,
        $idtiposangre,
        $idnacionalidad,
        $lugarnacimiento,
        $fechanacimiento,
        $idgradoescolaridad,
        $documentoescolaridad,
        $aniodocumentoescolaridad,
        $idprofesion,
        $iddepartamento,
        $idpuestotabulador,
        $idpuestoorganigrama,
        $idpuestoregistro,
        $idregionactual,
        $idadscripcionactual,
        $idcliente,
        $fechaingreso,
        $fechareingreso,
        $fechabaja,
        $motivobaja,
        $nombreemergencia,
        $telefonoemergencia,
        $correoemergencia,
        $numimss,
        $sueldonetomensual,
        $sueldodiarioimss,
        $idbanco,
        $numcuenta,
        $clabe,
        $tarjetadebito,
        $numcreditoinfonavit,
        $fechacreditoinfonavit,
        $tipocreditoinfonavit,
        $descuentoinfonavit,
        $tallacamisa,
        $tallapantalon,
        $tallazapatos,
        $tallachamarra,
        $capbasica,
        $capseginmuebles,
        $capmanejodefensivo,
        $capprimerosauxilios,
        $requiereregsnsp,
        $idestatusregsnsp,
        $outsourcing,
        $idempresaoutsourcing,
        $numempleado,
        $quien,
        @last_id
    )";
    //echo $query;
    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>