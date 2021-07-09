<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $idempleado = $_POST['idempleado'];

    $query = "call sp_fichaempleado_sel($idempleado);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'idempleado' => $row['idempleado'],
                'apellidopaterno' => $row['apellidopaterno'],
                'apellidomaterno' => $row['apellidomaterno'],
                'nombre' => $row['nombre'],
                'sexo' => $row['sexo'],
                'rfc' => $row['rfc'],
                'curp' => $row['curp'],
                'cuip' => $row['cuip'],
                'numcartilla' => $row['numcartilla'],
                'calle' => $row['calle'],
                'numexterior' => $row['numexterior'],
                'numinterior' => $row['numinterior'],
                'entrecalles' => $row['entrecalles'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'idmunicipio' => $row['idmunicipio'],
                'descmunicipio' => $row['descmunicipio'],
                'idestado' => $row['idestado'],
                'codigopostal' => $row['codigopostal'],
                'telefonocasa' => $row['telefonocasa'],
                'telefonocelular' => $row['telefonocelular'],
                'correoelectronico' => $row['correoelectronico'],
                'idestadocivil' => $row['idestadocivil'],
                'descestadocivil' => $row['descestadocivil'],
                'nombreconyuge' => $row['nombreconyuge'],
                'idtiposangre' => $row['idtiposangre'],
                'desctiposangre' => $row['desctiposangre'],
                'idnacionalidad' => $row['idnacionalidad'],
                'lugarnacimiento' => $row['lugarnacimiento'],
                'fechanacimiento' => $row['fechanacimiento'],
                'idgradoescolaridad' => $row['idgradoescolaridad'],
                'documentoescolaridad' => $row['documentoescolaridad'],
                'aniodocumentoescolaridad' => $row['aniodocumentoescolaridad'],
                'idprofesion' => $row['idprofesion'],
                'iddepartamento' => $row['iddepartamento'],
                'idpuestotabulador' => $row['idpuestotabulador'],
                'idpuestoorganigrama' => $row['idpuestoorganigrama'],
                'idpuestoregistro' => $row['idpuestoregistro'],
                'descpuesto' => $row['descpuesto'],
                'idregionactual' => $row['idregionactual'],
                'idadscripcionactual' => $row['idadscripcionactual'],
                'descadscripcion' => $row['descadscripcion'],
                'idclienteactual' => $row['idclienteactual'],
                'fechaingreso' => $row['fechaingreso'],
                'fechareingreso' => $row['fechareingreso'],
                'fechabaja' => $row['fechabaja'],
                'motivobaja' => $row['motivobaja'],
                'nombreemergencia' => $row['nombreemergencia'],
                'telefonoemergencia' => $row['telefonoemergencia'],
                'correoemergencia' => $row['correoemergencia'],
                'numimss' => $row['numimss'],
                'sueldonetomensual' => $row['sueldonetomensual'],
                'sueldodiarioimss' => $row['sueldodiarioimss'],
                'idbanco' => $row['idbanco'],
                'descbanco' => $row['descbanco'],
                'numcuenta' => $row['numcuenta'],
                'clabe' => $row['clabe'],
                'tarjetadebito' => $row['tarjetadebito'],
                'numcreditoinfonavit' => $row['numcreditoinfonavit'],
                'fechacreditoinfonavit' => $row['fechacreditoinfonavit'],
                'tipocreditoinfonavit' => $row['tipocreditoinfonavit'],
                'descuentoinfonavit' => $row['descuentoinfonavit'],
                'tallacamisa' => $row['tallacamisa'],
                'tallapantalon' => $row['tallapantalon'],
                'tallazapatos' => $row['tallazapatos'],
                'tallachamarra' => $row['tallachamarra'],
                'idestatus' => $row['idestatus'],
                'capbasica' => $row['capbasica'],
                'capseginmuebles' => $row['capseginmuebles'],
                'capmanejodefensivo' => $row['capmanejodefensivo'],
                'capprimerosauxilios' => $row['capprimerosauxilios'],
                'requiereregsnsp' => $row['requiereregsnsp'],
                'idestatusregsnsp' => $row['idestatusregsnsp'],
                'outsourcing' => $row['outsourcing'],
                'idempresaoutsourcing' => $row['idempresaoutsourcing'],
                'edad' => $row['edad'],
                'numimss' => $row['numimss'],
                'numempleado' => $row['numempleado']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>