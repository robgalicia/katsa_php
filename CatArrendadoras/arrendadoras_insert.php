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
    
    $pidarrendadora= form2insert($_POST['pidarrendadora'],1);
    $pnombre= form2insert($_POST['pnombre'],0);
    $pcalle= form2insert($_POST['pcalle'],0);
    $pnumexterior= form2insert($_POST['pnumexterior'],0);
    $pnuminterior= form2insert($_POST['pnuminterior'],0);
    $pcolonia= form2insert($_POST['pcolonia'],0);
    $pciudad= form2insert($_POST['pciudad'],0);
    $pidmunicipio= form2insert($_POST['pidmunicipio'],1);
    $pidestado= form2insert($_POST['pidestado'],1);
    $pcodigopostal= form2insert($_POST['pcodigopostal'],1);
    $prfc= form2insert($_POST['prfc'],0);
    $ppersonacontacto= form2insert($_POST['ppersonacontacto'],0);
    $ptelefonocontacto= form2insert($_POST['ptelefonocontacto'],0);
    $pcorreoelectronico= form2insert($_POST['pcorreoelectronico'],0);
    
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_arrendadora_ups(
        $pidarrendadora,
        $pnombre,
        $pcalle,
        $pnumexterior,
        $pnuminterior,
        $pcolonia,
        $pciudad,
        $pidmunicipio,
        $pidestado,
        $pcodigopostal,
        $prfc,
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