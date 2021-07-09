<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $idorden = form2insert($_POST['idorden'],1);

    $query = "call sp_ordencompra_print($idorden);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'proveedor' => $row['nombreproveedor'],
                'direccion' => $row['direccion'],
                'colonia' => $row['colonia'],
                'ciudad' => $row['ciudad'],
                'codigopostal' => $row['codigopostal'],
                'telefono' => $row['telefono'],
                'correoelectronico' => $row['correoelectronico'],
                'folioordencompra' => $row['folioordencompra'],
                'descestatus' => $row['descestatus'],
                'foliorequisicion' => $row['foliorequisicion'],
                'fechaorden' => $row['fechaorden'],
                'empleadoordena' => $row['empleadoordena'],
                'empleadosolicita' => $row['empleadosolicita'],
                'descdepartamento' => $row['descdepartamento'],
                'observaciones' => $row['observaciones'],
                'articulo' => $row['descarticulo'],
                'cantidad' => $row['cantidad'],
                'importe' => $row['importe'],
                'total' => $row['total']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>