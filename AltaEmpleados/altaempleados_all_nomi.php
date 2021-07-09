<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $fecha_ini = form2insert($_POST['fecha_ini'],0);
    $fecha_fin = form2insert($_POST['fecha_fin'],0);
    
    $query = "call sp_rptaltaempleados($fecha_ini, $fecha_fin)";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'Codigo' => $row['Codigo'],
                'Fechadealta' => $row['Fechadealta'],
                'Fechadebaja' => $row['Fechadebaja'],
                'Fechadereingreso' => $row['Fechadereingreso'],
                'Tipodecontrato' => $row['Tipodecontrato'],
                'Apellidopaterno' => $row['Apellidopaterno'],
                'Apellidomaterno' => $row['Apellidomaterno'],
                'Nombre' => $row['Nombre'],
                'Tipodeperiodo' => $row['Tipodeperiodo'],
                'Salariodiario' => $row['Salariodiario'],
                'SBCpartefija' => $row['SBCpartefija'],
                'Basedecotización' => $row['Basedecotización'],
                'Estatusempleado' => $row['Estatusempleado'],
                'Departamento' => $row['Departamento'],
                'Sindicalizado' => $row['Sindicalizado'],
                'Basedepago' => $row['Basedepago'],
                'Metododepago' => $row['Metododepago'],
                'Turnodetrabajo' => $row['Turnodetrabajo'],
                'Zonadesalario' => $row['Zonadesalario'],
                'Campoextra1' => $row['Campoextra1'],
                'Campoextra2' => $row['Campoextra2'],
                'Campoextra3' => $row['Campoextra3'],
                'Afore' => $row['Afore'],
                'Expediente' => $row['Expediente'],
                'Numseguridadsocial' => $row['Numseguridadsocial'],
                'rfc' => $row['rfc'],
                'curp' => $row['curp'],
                'sexo' => $row['sexo'],
                'Ciudaddenacimiento' => $row['Ciudaddenacimiento'],
                'Fechadenacimiento' => $row['Fechadenacimiento'],
                'UMF' => $row['UMF'],
                'Nombredelpadre' => $row['Nombredelpadre'],
                'Nombredelamadre' => $row['Nombredelamadre'],
                'Direccion' => $row['Direccion'],
                'Puesto' => $row['Puesto'],
                'Poblacion' => $row['Poblacion'],
                'Entidadfederativadeldomicilio' => $row['Entidadfederativadeldomicilio'],
                'Cp' => $row['Cp'],
                'Estadocivil' => $row['Estadocivil'],
                'Telefono' => $row['Telefono'],
                'Avisopendientemodificacionsbc' => $row['Avisopendientemodificacionsbc'],
                'Avisopendientereingresoimss' => $row['Avisopendientereingresoimss'],
                'Avisopendientebajaimss' => $row['Avisopendientebajaimss'],
                'Avisopendientecambiobasecotiza' => $row['Avisopendientecambiobasecotiza'], 
                'Fechadelsalariodiario' => $row['Fechadelsalariodiario'],
                'Fechasbcpartefija' => $row['Fechasbcpartefija'],
                'Salariovariable' => $row['Salariovariable'],
                'Fechasalariovariable' => $row['Fechasalariovariable'], 
                'Salariopromedio' => $row['Salariopromedio'],
                'Fechasalariopromedio' => $row['Fechasalariopromedio'], 
                'Salariobaseliquidacion' => $row['Salariobaseliquidacion'],
                'Saldodelajustealneto' => $row['Saldodelajustealneto'],
                'Calculoptu' => $row['Calculoptu'],
                'Calculoaguinaldo' => $row['Calculoaguinaldo'],
                'Bancoparapagoelectronico' => $row['Bancoparapagoelectronico'],
                'Numerodecuentaparapagoelectronico' => $row['Numerodecuentaparapagoelectronico'],
                'Sucursalparapagoelectronico' => $row['Sucursalparapagoelectronico'],
                'Causadelaultimabaja' => $row['Causadelaultimabaja'],
                'Campoextranumerico1' => $row['Campoextranumerico1'],
                'Campoextranumerico2' => $row['Campoextranumerico2'],
                'Campoextranumerico3' => $row['Campoextranumerico3'],
                'Campoextranumerico4' => $row['Campoextranumerico4'],
                'Campoextranumerico5' => $row['Campoextranumerico5'],
                'Fechasalariomixto' => $row['Fechasalariomixto'],
                'Salariomixto' => $row['Salariomixto'],
                'Registropatronaldelimss' => $row['Registropatronaldelimss'],
                'Numerofonacot' => $row['Numerofonacot'],
                'Correoelectronico' => $row['Correoelectronico'],
                'Tipoderegimen' => $row['Tipoderegimen'],
                'Clabeinterbancaria' => $row['Clabeinterbancaria'],
                'Entidadfederativadenacimiento' => $row['Entidadfederativadenacimiento'], 
                'Tipodeprestacion' => $row['Tipodeprestacion'],
                'Extranjerosincurp' => $row['Extranjerosincurp'],
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>