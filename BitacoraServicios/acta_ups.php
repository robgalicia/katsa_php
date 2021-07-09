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
    
    $pidactaservicio = form2insert($_POST['pidactaservicio'],1);
    $pidordenservicio = form2insert($_POST['pidordenservicio'],1);
    $pnumeroacta = form2insert($_POST['pnumeroacta'],1);
    $pfechaacta = form2insert($_POST['pfechaacta'],0);
    $ptipoacta = form2insert($_POST['ptipoacta'],0);
    $pobservaciones = form2insert($_POST['pobservaciones'],0);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_actaservicio_ups(
        $pidactaservicio,
        $pidordenservicio,
        $pnumeroacta,
        $pfechaacta,
        $ptipoacta,
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