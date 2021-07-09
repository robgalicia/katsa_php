<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idordencompracliente = $_POST['idordencompracliente'];    

    $query = "call sp_ordencompracliente_sel($idordencompracliente);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idordencompracliente' => $row['idordencompracliente'],
                'folioordencompra' => $row['folioordencompra'],
                'fecha' => $row['fecha'],
                'idcliente' => $row['idcliente'],
                'idcotizacion' => $row['idcotizacion'],
                'lugarservicio' => $row['lugarservicio'],
                'idtipomoneda' => $row['idtipomoneda'],
                'tipocambio' => $row['tipocambio'],
                'observaciones' => $row['observaciones'],
                'importetotal' => $row['importetotal'],

                'idordencompraclientedetalle' => $row['idordencompraclientedetalle'], 
                'item' => $row['item'], 
                'idservicio' => $row['idservicio'], 
                'descservicio' => $row['descservicio'],
                'cantidad' => $row['cantidad'], 
                'preciounitario' => $row['preciounitario'], 
                'importetotal' => $row['importetotal']                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>
