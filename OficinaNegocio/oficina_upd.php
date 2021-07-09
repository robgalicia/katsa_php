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
    
    $nombrecomercial = form2insert($_POST['nombrecomercial'],0);
    $gironegocio = form2insert($_POST['gironegocio'],0);
    $calle = form2insert($_POST['calle'],0);
    $numeroext = form2insert($_POST['numeroext'],0);
    $numeroint = form2insert($_POST['numeroint'],0);
    $entrecalles = form2insert($_POST['entrecalles'],0);
    $colonia = form2insert($_POST['colonia'],0);
    $ciudad = form2insert($_POST['ciudad'],0);
    $codigopostal = form2insert($_POST['codigopostal'],1);
    $estado = form2insert($_POST['estado'],1);
    $municipio = form2insert($_POST['municipio'],1);
    $telefono = form2insert($_POST['telefono'],0);
    $nombreoficina = form2insert($_POST['nombreoficina'],0);
    $correoelectronico = form2insert($_POST['correoelectronico'],0);
    $representantelegal = form2insert($_POST['representantelegal'],0);
    $sexorepresentantelegal = form2insert($_POST['sexorepresentantelegal'],0);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_oficinanegocio_ups(
        $nombrecomercial,
        $gironegocio,
        $calle,
        $numeroext,
        $numeroint,
        $entrecalles,
        $colonia,
        $ciudad,
        $codigopostal,
        $estado,
        $municipio,
        $telefono,
        $nombreoficina,
        $correoelectronico,
        $representantelegal,
        $sexorepresentantelegal,
        $quien
    )";

    $result = $bd->query($query);

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>