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

    $pidtraslado = form2insert($_POST['pidtraslado'],1);
    $pfechaservicio = form2insert($_POST['pfechaservicio'],0);
    $psolicitante = form2insert($_POST['psolicitante'],0);
    $pempresa = form2insert($_POST['pempresa'],0);
    $ptiposervicio = form2insert($_POST['ptiposervicio'],0);
    $pidrutatraslado = form2insert($_POST['pidrutatraslado'],1);
    $pestraslado = form2insert($_POST['pestraslado'],0);
    $pescordillera = form2insert($_POST['pescordillera'],0);
    $pesavanzada = form2insert($_POST['pesavanzada'],0);
    $pobservaciones = form2insert($_POST['pobservaciones'],0);

    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_traslado_ups(
        $pidtraslado,
        $pfechaservicio,
        $psolicitante,
        $pempresa,
        $ptiposervicio,
        $pidrutatraslado,
        $pestraslado,
        $pescordillera,
        $pesavanzada,
        $pobservaciones,
        $quien,
        @last_id
    )";
    #echo $query;
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
        'result' => $result
    );

    echo json_encode($arraySingle);

    

?>