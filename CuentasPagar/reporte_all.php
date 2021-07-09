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
    $region = form2insert($_POST['region'],1);
    $cuentas = $_POST['cuentas'];

    $query = "";

    if ($cuentas == 'facturas') $query = "call sp_ordencomprafactura_vencidas($region,$fecha_fin);";

    if ($cuentas == 'programados') $query = "call sp_ordencomprafactura_programadas($region,$fecha_ini,$fecha_fin);";

    if ($cuentas == 'realizados') $query = "call sp_ordencomprafactura_pagadas($region,$fecha_ini,$fecha_fin);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            if ($cuentas == 'facturas'){

                $arraySingle = array(
                    'idordencomprafactura' => $row['idordencomprafactura'],
                    'folioordencompra' => $row['folioordencompra'],
                    'fechaorden' => $row['fechaorden'],
                    'nombreproveedor' => $row['nombreproveedor'],
                    'importetotal' => $row['importetotal'],
                    'fechafactura' => $row['fechafactura'],
                    'fechavencimiento' => $row['fechavencimiento'],
                    'fechapagoprogramado' => $row['fechapagoprogramado']
                );
    
                $arrayTodo[] = $arraySingle;

            }else{
                
                $arraySingle = array(
                    'idordencomprafactura' => $row['idordencomprafactura'],
                    'folioordencompra' => $row['folioordencompra'],
                    'fechaorden' => $row['fechaorden'],
                    'nombreproveedor' => $row['nombreproveedor'],
                    'importetotal' => $row['importetotal'],
                    'fechafactura' => $row['fechafactura'],
                    'fechavencimiento' => $row['fechavencimiento'],
                    'fechapagado' => $row['fechapagado'],
                    'fechapagoprogramado' => $row['fechapagoprogramado']
                );
    
                $arrayTodo[] = $arraySingle;
            }

            
        }
        echo json_encode($arrayTodo);
    }
?>