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

    $pidtiposalidainventario = form2insert($_POST['pidtiposalidainventario'],1);
    $pidalmacen = form2insert($_POST['pidalmacen'],1);
    $pidempleadoautoriza = form2insert($_SESSION["idempleado"],1);
    $pidempleadorecibe = form2insert($_POST['pidempleadorecibe'],1);
    $pobservaciones = form2insert($_POST['pobservaciones'],0);
    $pcostototal = form2insert($_POST['pcostototal'],1);
    $pidregion= form2insert($_POST['pidregion'],1);
    $pidadscripcion= form2insert($_POST['pidadscripcion'],1);
    $pidcliente= form2insert($_POST['pidcliente'],1);
    $piddepartamento= form2insert($_POST['piddepartamento'],1);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_salidainventario_ins(
        $pidtiposalidainventario,
        $pidalmacen,
        $pidempleadoautoriza,
        $pidempleadorecibe,
        $pobservaciones,
        $pcostototal,
        $pidregion,
        $pidadscripcion,
        $pidcliente,
        $piddepartamento,
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