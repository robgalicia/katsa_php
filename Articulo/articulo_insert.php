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
    
    $pidarticulo = form2insert($_POST['idArticulo'],1);    
    $pcodigoarticulo = form2insert($_POST['codigo'],0);
    $pdescarticulo = form2insert($_POST['nombre_articulo'],0);
    $pdescarticuloprov = form2insert($_POST['desc_proveedor'],0);
    $pidunidadmedida = form2insert($_POST['unidad_medida'],1);
    $pidpartidagto = form2insert($_POST['partida_gastos_mdl'],1);
    $pidpartidacto = form2insert($_POST['partida_costos_mdl'],1);
    $pidpartidainv = form2insert($_POST['partida_inversiones_mdl'],1);
    $pidproveedor = form2insert($_POST['proveedor_mdl'],1);

    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }
    
    $arrayTodo = array();

    $query = "call sp_articulo_ups(
        $pidarticulo,
        $pcodigoarticulo,
        $pdescarticulo,
        $pdescarticuloprov,
        $pidunidadmedida,
        $pidpartidagto,
        $pidpartidacto,
        $pidpartidainv,
        $pidproveedor,
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