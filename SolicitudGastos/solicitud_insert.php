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
    
    $pidgastoscomprobar = form2insert($_POST['idgastoscomprobar'],1);
    $ptipogasto = form2insert($_POST['ptipogasto'],0);
    $plugarviaje = form2insert($_POST['plugarviaje'],0);
    $pidtipoviaje = form2insert($_POST['pidtipoviaje'],1);
    $pmotivoviaje = form2insert($_POST['pmotivoviaje'],0);
    $pdiasviaje = form2insert($_POST['pdiasviaje'],1);
    $pfechainicial = form2insert($_POST['pfechainicial'],0);
    $pfechafinal = form2insert($_POST['pfechafinal'],0);
    $pdistanciakms = form2insert($_POST['pdistanciakms'],1);
    $pidregion = form2insert($_POST['pidregion'],1);
    $pidadscripcion = form2insert($_POST['pidadscripcion'],1);
    $piddepartamento = form2insert($_POST['piddepartamento'],1);
    $pidcliente = form2insert($_POST['pidcliente'],1);
    $pidempleadosolicita = form2insert($_POST['pidempleadosolicita'],1);
    $pidempleadobeneficiario = form2insert($_POST['pidempleadobeneficiario'],1);
    $pcorreoelectronico = form2insert($_POST['pcorreoelectronico'],0);
    $pobservaciones = form2insert($_POST['pobservaciones'],0);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_gastoscomprobar_ups(
        $pidgastoscomprobar,
        $ptipogasto,
        $plugarviaje,
        $pidtipoviaje,
        $pmotivoviaje,
        $pdiasviaje,
        $pfechainicial,
        $pfechafinal,
        $pdistanciakms,
        $pidregion,
        $pidadscripcion,
        $piddepartamento,
        $pidcliente,
        $pidempleadosolicita,
        $pidempleadobeneficiario,
        $pcorreoelectronico,
        $pobservaciones,
        $quien,
        @last_id
    )";
    //echo $query;
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
        //$se_envio = correo_autorizar($last,'V','R');
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