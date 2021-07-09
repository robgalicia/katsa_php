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

    $idregion = form2insert($_POST['idregion'],1);
    $idadscripcion = form2insert($_POST['idadscripcion'],1);
    $iddepartamento = form2insert($_POST['iddepartamento'],1);
    $idcliente = form2insert($_POST['idcliente'],1);
    $idempleadosolicita = form2insert($_POST['idempleadosolicita'],1);
    $tiporequisicion = form2insert($_POST['tiporequisicion'],0);
    $observaciones = form2insert($_POST['observaciones'],0);

    $centrocostos = form2insert($_POST['centrocostos'],1);
    $tipoentrega = form2insert($_POST['tipoentrega'],0);
    $plazoentrega = form2insert($_POST['plazoentrega'],1);

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_requisicion_ins(
        $idregion,
        $iddepartamento,
        $idcliente,
        $idempleadosolicita,
        $tiporequisicion,
        $observaciones,
        $idadscripcion,
        $centrocostos,
        $tipoentrega,
        $plazoentrega,
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

    $se_envio = '';

    if($result){
        /*
            Funcion que manda un mail para revisar o autorizar una solicitud
            solicitud -> 'R' = Requisicion, 'V' = Viaticos
            accion -> 'R' = Revisa, 'A' = Autoriza
        */
        //$se_envio = correo_autorizar($last,'R','R');
    }

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'se_envio' => $se_envio,
        'lastid' => $last,
        'result' => $result
    );

    echo json_encode($arraySingle);

?>