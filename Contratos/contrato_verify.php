<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $idempleado = form2insert($_POST['idempleado'],1);
    
    $arrayTodo = array();

    $query = "call sp_empleadocontrato_valida(
        $idempleado,        
        @valida,
        @mensaje
    )";

    $result = $bd->query($query);

    $result = $bd->query("select @valida as valida, @mensaje as mensaje;");

    $valida = '';
    $mensaje = '';

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        
            
            $valida = $row['valida'];
            $mensaje = $row['mensaje'];

        }        
    }

    $arraySingle = array(
        'mensaje' => 'ok',
        'query' => $query,
        'valida' => $valida,
        'mensaje' => $mensaje,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>
