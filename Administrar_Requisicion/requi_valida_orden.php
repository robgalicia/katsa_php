<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    include ("../Comun/mail_to_autorizar.php");
    $bd = new Conexion();

    $movil = true;
    
    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $idrequi = form2insert($_POST['idrequi'],1);

    $query = "call sp_requisicion_validaorden(
        $idrequi,
        @estatus,
        @observaciones
    )";
    
    $estatus = '';
    $observaciones = '';

    $result = $bd->query($query);

    $result = $bd->query("select @estatus as estatus, @observaciones as observaciones;");

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        
            
            $estatus = $row['estatus'];
            $observaciones = $row['observaciones'];

        }        
    }
   
    $arraySingle = array(        
        'query' => $query,
        'estatus' => $estatus,
        'observaciones' => $observaciones,
        'idrequi' => $idrequi,
        'result' => $result
    );

    echo json_encode($arraySingle);

?>