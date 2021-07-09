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
    $idempleado = $_SESSION['idempleado'];
    $anio = form2insert($_POST['anio'],1);
    $mes = form2insert($_POST['mes'],1);
    $estatus = form2insert($_POST['estatus'],0);

    $query = "call sp_gastoscomprobar_all($idregion,$iddepartamento,$idempleado,$anio,$mes,$estatus);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idgastoscomprobar' => $row['idgastoscomprobar'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'fecharevision' => $row['fecharevision'],
                'fechaautorizacion' => $row['fechaautorizacion'],
                'fechacancelacion' => $row['fechacancelacion'],
                'importetotal' => $row['importetotal'],
                'tipogasto' => $row['tipogasto'],
                'descestatus' => $row['descestatus'],
                'fechalimitecomprobacion' => $row['fechalimitecomprobacion'],
                'fechacomprobacion' => $row['fechacomprobacion']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>