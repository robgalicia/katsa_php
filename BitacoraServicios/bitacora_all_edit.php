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
    
    $pidordenservicio = form2insert($_POST['pidordenservicio'],1);
    $pnumeroacta = form2insert($_POST['pnumeroacta'],1);
    $pfechainicio = form2insert($_POST['pfechainicio'],0);
    $pidregion = form2insert($_POST['pidregion'],1);
    $pidcotizacion = form2insert($_POST['pidcotizacion'],1);
    $pidcliente = form2insert($_POST['pidcliente'],1);
    $pfolioordencompra = form2insert($_POST['pfolioordencompra'],0);
    $pfechaordencompra = form2insert($_POST['pfechaordencompra'],0);
    $pidservicio = form2insert($_POST['pidservicio'],1);
    $plugarservicio = form2insert($_POST['plugarservicio'],0);
    $pnumelementos = form2insert($_POST['pnumelementos'],1);
    $ptipoturno = form2insert($_POST['ptipoturno'],0);
    $prechabvehiculo = form2insert($_POST['prechabvehiculo'],0);
    $prechabvehiculotipo = form2insert($_POST['prechabvehiculotipo'],0);
    $prechabequipocom = form2insert($_POST['prechabequipocom'],0);
    $prechabequipocomtipo = form2insert($_POST['prechabequipocomtipo'],0);
    $prechabgps = form2insert($_POST['prechabgps'],0);
    $prechabgpstipo = form2insert($_POST['prechabgpstipo'],0);
    $prechabcasetavig = form2insert($_POST['prechabcasetavig'],0);
    $prechabcasetavigtipo = form2insert($_POST['prechabcasetavigtipo'],0);
    $prechabgenelectrico = form2insert($_POST['prechabgenelectrico'],0);
    $prechabgenelectricotipo = form2insert($_POST['prechabgenelectricotipo'],0);
    $prechabmediorest = form2insert($_POST['prechabmediorest'],0);
    $prechabmedioresttipo = form2insert($_POST['prechabmedioresttipo'],0);
    $pobservaciones = form2insert($_POST['pobservaciones'],0);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_ordenservicio_ups(
        $pidordenservicio,
        $pnumeroacta,
        $pfechainicio,
        $pidregion,
        $pidcotizacion,
        $pidcliente,
        $pfolioordencompra,
        $pfechaordencompra,
        $pidservicio,
        $plugarservicio,
        $pnumelementos,
        $ptipoturno,
        $prechabvehiculo,
        $prechabvehiculotipo,
        $prechabequipocom,
        $prechabequipocomtipo,
        $prechabgps,
        $prechabgpstipo,
        $prechabcasetavig,
        $prechabcasetavigtipo,
        $prechabgenelectrico,
        $prechabgenelectricotipo,
        $prechabmediorest,
        $prechabmedioresttipo,
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

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'lastid' => $last,
        'result' => $result
    );

    echo json_encode($arraySingle);

    

?>