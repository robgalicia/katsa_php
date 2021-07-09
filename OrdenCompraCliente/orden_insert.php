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
    
    $idordencompracliente = form2insert($_POST["idordencompracliente"],1);
    $folioordencompra = form2insert($_POST["folioordencompra"],1);
    $fecha = form2insert($_POST["fecha"],0);
    $idcliente = form2insert($_POST["idcliente"],1);
    $idclientedomiciliofiscal = form2insert($_POST["idclientedomiciliofiscal"],1);
    $idcotizacion = form2insert($_POST["idcotizacion"],1);
    $lugarservicio = form2insert($_POST["lugarservicio"],0);
    $idtipomoneda = form2insert($_POST["idtipomoneda"],1);
    $tipocambio = form2insert($_POST["tipocambio"],1);
    $observaciones = form2insert($_POST["observaciones"],0);    

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_ordencompracliente_ups(
        $idordencompracliente,
        $folioordencompra,
        $fecha,
        $idcliente,
        $idclientedomiciliofiscal,
        $idcotizacion,
        $lugarservicio,
        $idtipomoneda,
        $tipocambio,
        $observaciones,        
        $quien,
        @last_id
    )";

    $last = -1;

    $result = $bd->query($query);

    $result = $bd->query("select @last_id as lastid;");

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $last = $row['lastid'];

        }        
    }


    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,        
        'lastid' => $last,
        'result' => $result
    );

    echo json_encode($arraySingle);

?>