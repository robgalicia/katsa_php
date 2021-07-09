<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();

    if( !isset($_POST["movil"]) ){

        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }

    $arrayTodo = array();

    $idregion = form2insert( $_POST['idregion'] , 1 );
    $idadscripcion = form2insert( $_POST['idadscripcion'] , 1 );
    $idcliente = form2insert( $_POST['idcliente'] , 1 );
    $fecha = form2insert( $_POST['fecha'] , 0 );
    $grupo = form2insert( $_POST['grupo'] , 1 );
    $tipolista = form2insert( $_POST['tipolista'] , 0 );    

    $query = "call sp_rptasistenciaingeniero_all(
        $idregion,
        $idadscripcion,
        $idcliente,
        $fecha,
        $grupo,
        $tipolista
    );";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                                
                'tipovehiculo' => $row['tipovehiculo'],
                'nombreingeniero' => $row['nombreingeniero'],
                'numeconomico' => $row['numeconomico'],
                'grupo' => $row['grupo'],
                'fecha' => $row['fecha'],
                'latitud' => $row['latitud'],
                'longitud' => $row['longitud'],
                'tipolista' => $row['tipolista']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>