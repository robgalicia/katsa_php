<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $idregion = form2insert($_POST['idregion'],1);
    $iddepartamento = form2insert($_POST['iddepartamento'],1);    
    $anio = form2insert($_POST['anio'],1);
    $mes = form2insert($_POST['mes'],1);
    $folio = $_POST['folio'];

    $query = "call sp_ordencompra_all($idregion,$iddepartamento,$anio,$mes,'$folio');";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idordencompra' => $row['idordencompra'],
                'idordencomprafactura' => $row['idordencomprafactura'],
                'foliorequisicion' => $row['foliorequisicion'],
                'folioordencompra' => $row['folioordencompra'],
                'fechaorden' => $row['fechaorden'],
                'nombreproveedor' => $row['nombreproveedor'],
                'importetotal' => $row['importetotal'],
                'descestatus' => $row['descestatus'],
                'idestatus' => $row['idestatus'],
                'fechafactura' => $row['fechafactura']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>