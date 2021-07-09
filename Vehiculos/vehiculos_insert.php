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
    $idmarcavehiculo = form2insert($_POST['marca'],1);
    $submarca = form2insert($_POST['sub_marca'],0);
    $aniomodelo = form2insert($_POST['anio_modelo'],1);
    $placas = form2insert($_POST['placas'],0);
    $color = form2insert($_POST['color'],1);
    $cilindros = form2insert($_POST['cilindros'],1);
    $numserie = form2insert($_POST['num_serie'],0);
    $nummotor = form2insert($_POST['num_motor'],0);
    $tipotransmision = form2insert($_POST['tipo_transmision'],0);
    $idtipocombustible = form2insert($_POST['tipo_combustible'],1);
    $capacidadtanque = form2insert($_POST['capacidad_tanque'],1);
    $numeconomico = form2insert($_POST['num_economico'],0);
    $tarjetacombustible = form2insert($_POST['tarjeta_combustible'],0);
    $esarrendado = form2insert($_POST['arrendado'],0);
    $idarrendadora = form2insert($_POST['propietario'],1);
    $observaciones = form2insert($_POST['observaciones'],0);
    $fecha_baja = form2insert($_POST['fecha_baja'],0);
    $motivo_baja = form2insert($_POST['motivo_baja'],0);

    $tiene_GPS = form2insert($_POST['tiene_GPS'],0);
    $proveedor_gps = form2insert($_POST['proveedor_gps'],0);
    

    $quien = '';

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }

    $arrayTodo = array();

    $query = "call sp_vehiculo_ups(
        $idvehiculo,
        $idmarcavehiculo,
        $submarca,
        $aniomodelo,
        $placas,
        $color,
        $cilindros,
        $numserie,
        $nummotor,
        $tipotransmision,
        $idtipocombustible,
        $capacidadtanque,
        $numeconomico,
        $tarjetacombustible,
        $esarrendado,
        $idarrendadora,
        $observaciones,
        $tiene_GPS,
        $proveedor_gps,
        $fecha_baja,
        $motivo_baja,
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