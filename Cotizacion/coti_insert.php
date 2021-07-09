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
    
    $idcotizacion = form2insert($_POST['idcotizacion'],1);
    $fecha = form2insert($_POST['fecha'],0);
    $lugarexpedicion = form2insert($_POST['lugarexpedicion'],0);
    $asunto = form2insert($_POST['asunto'],0);
    $idcliente = form2insert($_POST['idcliente'],1);
    $personacontacto = form2insert($_POST['personacontacto'],0);
    $personacopia = form2insert($_POST['personacopia'],0);
    $tiposervicio = form2insert($_POST['tiposervicio'],0);
    $lugarservicio = form2insert($_POST['lugarservicio'],0);
    $ubicacionlugar = form2insert($_POST['ubicacionlugar'],0);
    $idempleadoelabora = form2insert($_SESSION['idempleado'],1);
    $idempleadofirma = form2insert($_POST['idempleadofirma'],1);
    $idtipomoneda = form2insert($_POST['idtipomoneda'],1);
    // $tipocambio = form2insert($_POST['tipocambio'],1);
    $fechainicio = form2insert($_POST['fechainicio'],0);
    $fechafinal = form2insert($_POST['fechafinal'],0);

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_cotizacion_ups(
        $idcotizacion,
        $fecha,
        $lugarexpedicion,
        $asunto,
        $idcliente,
        $personacontacto,
        $personacopia,
        $tiposervicio,
        $lugarservicio,
        $ubicacionlugar,
        $idempleadoelabora,
        $idempleadofirma,
        $idtipomoneda,        
        $fechainicio,
        $fechafinal,
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