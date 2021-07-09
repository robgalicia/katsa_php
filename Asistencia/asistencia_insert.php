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

    $idasistenciaingeniero = form2insert($_POST['idasistenciaingeniero'],1);
    $idregion = form2insert($_POST['idregion'],1);
    $idadscripcion = form2insert($_POST['idadscripcion'],1);
    $idcliente = form2insert($_POST['idcliente'],1);
    $fecha = form2insert($_POST['fecha'],0);
    $grupo = form2insert($_POST['grupo'],1);
    $tipolista = form2insert($_POST['tipolista'],0);
    $idingeniero = form2insert($_POST['idingeniero'],1);
    $tipovehiculo = form2insert($_POST['tipovehiculo'],0);
    $numeconomico = form2insert($_POST['numeconomico'],0);
    $idempleadoregistra = form2insert($_POST['idempleadoregistra'],1);
    $latitud = form2insert($_POST['latitud'],0);
    $longitud = form2insert($_POST['longitud'],0);

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_asistenciaingeniero_ups(
        $idasistenciaingeniero,
        $idregion,
        $idadscripcion,
        $idcliente,
        $fecha,
        $grupo,
        $tipolista,
        $idingeniero,
        $tipovehiculo,
        $numeconomico,
        $idempleadoregistra,
        $latitud,
        $longitud,
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
        'idingeniero' => $idingeniero,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>