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
    
    $pidempresaoutsourcing = form2insert($_POST['idempresa'],1);
    $pnombreempresa = form2insert($_POST['nombreEmpresa'],0);
    $pnombrecorto = form2insert($_POST['nombreCorto'],0);
    $pdomicilio = form2insert($_POST['domicilio'],0);
    $pcolonia = form2insert($_POST['colonia'],0);
    $pciudad = form2insert($_POST['ciudad'],0);
    $pidmunicipio = form2insert($_POST['idmunicipio'],0);
    $pidestado = form2insert($_POST['idestado'],0);
    $ppersonacontacto = form2insert($_POST['contacto'],0);
    $ptelefonocontacto = form2insert($_POST['telefono'],0);
    $pcorreoelectronico = form2insert($_POST['correo'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_empresaout_ups(
        $pidempresaoutsourcing,
        $pnombreempresa,
        $pnombrecorto,
        $pdomicilio,
        $pcolonia,
        $pciudad,
        $pidmunicipio,
        $pidestado,
        $ppersonacontacto,
        $ptelefonocontacto,
        $pcorreoelectronico,
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