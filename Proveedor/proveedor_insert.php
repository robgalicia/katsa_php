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
    
    $pidproveedor = form2insert($_POST['idProveedor'],1);    
    $pnombre = form2insert($_POST['nombre'],0);
    $prepresentante = form2insert($_POST['representante'],0);
    $pdireccion = form2insert($_POST['direccion'],0);
    $pcolonia = form2insert($_POST['colonia'],0);
    $pciudad = form2insert($_POST['ciudad'],0);
    $pidestado = form2insert($_POST['estado'],1);
    $pcodigopostal = form2insert($_POST['codigopostal'],0);
    $prfc = form2insert($_POST['rfc'],0);
    $ptelefono = form2insert($_POST['telefono'],0);
    $pcorreoelectronico = form2insert($_POST['correoelectronico'],0);
    $pdiascredito = form2insert($_POST['diascredito'],1);
    $pidbancodeposito = form2insert($_POST['bancodeposito'],1);
    $pcuentadeposito = form2insert($_POST['cuentadeposito'],0);
    $pcuentacontable = form2insert($_POST['cuentacontable'],0);
    $ppersonafiscal = form2insert($_POST['personafiscal'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_proveedor_ups(
        $pidproveedor,
        $pnombre,
        $prepresentante,
        $pdireccion,
        $pcolonia,
        $pciudad,
        $pidestado,
        $pcodigopostal,
        $prfc,
        $ptelefono,
        $pcorreoelectronico,
        $pdiascredito,
        $pidbancodeposito,
        $pcuentadeposito,
        $pcuentacontable,
        $ppersonafiscal,
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