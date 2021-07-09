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

    $pidajusteinventario = form2insert($_POST['pidajusteinventario'],1);
    $pidarticulo = form2insert($_POST['pidarticulo'],1);
    $pcantidad = form2insert($_POST['pcantidad'],1);
    $pcostounitario = form2insert($_POST['pcostounitario'],1);
    $pcostototal = form2insert($_POST['pcostototal'],1);


    $quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    $arrayTodo = array();


    $query = "call sp_ajusteinventariodetalle_ins(
        $pidajusteinventario,
        $pidarticulo,
        $pcantidad,
        $pcostounitario,
        $pcostototal,
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