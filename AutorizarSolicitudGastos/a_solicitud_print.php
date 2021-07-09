<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $idsolicitud = form2insert($_POST['idsolicitud'],1);

    $query = "call sp_gastoscomprobar_print($idsolicitud);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'empleadosolicita' => $row['empleadosolicita'],
                'empleadosupervisor' => $row['empleadosupervisor'],
                'empleadobeneficiario' => $row['empleadobeneficiario'],
                'descdepartamento' => $row['descdepartamento'],
                'nombrecliente' => $row['nombrecliente'],
                'folio' => $row['folio'],
                'descestatus' => $row['descestatus'],
                'fechasolicitud' => $row['fechasolicitud'],
                'fecharevision' => $row['fecharevision'],
                'fechaautorizacion' => $row['fechaautorizacion'],
                'observaciones' => $row['observaciones'],
                'descpartida' => $row['descpartida'],
                'importe' => $row['importe'],
                'justificacion' => $row['justificacion'],
                'cantidadautoriza' => $row['cantidadautoriza'],
                'importeautoriza' => $row['importeautoriza'],
                'totalautoriza' => $row['totalautoriza']
            );

            $arrayTodo[] = $arraySingle;            
        }
        //echo $result;
        echo json_encode($arrayTodo);
    }
?>