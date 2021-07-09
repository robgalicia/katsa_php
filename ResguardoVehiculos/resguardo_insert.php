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

    $idvehiculo = form2insert($_POST['idvehiculo'],1);
    $placas = form2insert($_POST['placas'],0);
    $fecharesguardo = form2insert($_POST['fecharesguardo'],0);
    $tiporesguardo = form2insert($_POST['tiporesguardo'],0);
    $idempleadoresguardo = form2insert($_POST['idempleadoresguardo'],1);
    $idempleadosupervisor = form2insert($_POST['idempleadosupervisor'],1);
    $idregion = form2insert($_POST['idregion'],1);
    $idadscripcion = form2insert($_POST['idadscripcion'],1);
    $idcliente = form2insert($_POST['idcliente'],1);
    $kilometrajeultimoservicio = form2insert($_POST['kilometrajeultimoservicio'],1);
    $fechaultimoservicio = form2insert($_POST['fechaultimoservicio'],0);
    $kilometrajeactual = form2insert($_POST['kilometrajeactual'],1);
    $kilometrajeproximoservicio = form2insert($_POST['kilometrajeproximoservicio'],1);
    $observaciones = form2insert($_POST['observaciones'],0);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculoresguardo_ins(
        $idvehiculo,
        $placas,
        $fecharesguardo,
        $tiporesguardo,
        $idempleadoresguardo,
        $idempleadosupervisor,
        $idregion,
        $idadscripcion,
        $idcliente,
        $kilometrajeultimoservicio,
        $fechaultimoservicio,
        $kilometrajeactual,
        $kilometrajeproximoservicio,
        $observaciones,
        $quien,
        @last_id
    )";

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>