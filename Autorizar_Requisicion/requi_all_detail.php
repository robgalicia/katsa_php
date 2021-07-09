<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    
    if( !isset($_POST["movil"]) ){
        $movil = false;
        session_start();
        if( !isset($_SESSION["idusuario"]) ){
            header("Location: ../Inicio/");
        }   

    }   

    $arrayTodo = array();    

    $idrequi = form2insert($_POST['idrequi'],1);

    $query = "call sp_requisicion_sel($idrequi);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idrequisicion' => $row['idrequisicion'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'idregion' => $row['idregion'],
                'descregion' => $row['descregion'],
                'iddepartamento' => $row['iddepartamento'],
                'descdepartamento' => $row['descdepartamento'],
                'idcliente' => $row['idcliente'],
                'nombrecliente' => $row['nombrecliente'],
                'idempleadosolicita' => $row['idempleadosolicita'],
                'empleadosolicita' => $row['empleadosolicita'],
                'idempleadorevisa' => $row['idempleadorevisa'],
                'empleadorevisa' => $row['empleadorevisa'],
                'fecharevision' => $row['fecharevision'],
                'idempleadoautoriza' => $row['idempleadoautoriza'],
                'empleadoautoriza' => $row['empleadoautoriza'],
                'fechaautorizacion' => $row['fechaautorizacion'], 
                'fechacancelacion' => $row['fechacancelacion'],
                'importetotal' => $row['importetotal'],
                'tiporequisicion' => $row['tiporequisicion'],
                'idestatus' => $row['idestatus'],
                'descestatus' => $row['descestatus'],
                'observaciones' => $row['observaciones'],
                'fechacancelacion' => $row['fechacancelacion'],
                'idrequisiciondetalle' => $row['idrequisiciondetalle'],
                'idarticulo' => $row['idarticulo'],
                'articulo' => $row['descarticulo'],
                'cantidad' => $row['cantidad'],
                'importe' => $row['importe'],
                'especificaciones' => $row['especificaciones'],
                'centrocostos' => $row['centrocostos'],
                'tipoentrega' => $row['tipoentrega'],
                'plazoentrega' => $row['plazoentrega'],
                'total' => $row['total'],
                'idproveedor' => $row['idproveedor'],
                'proveedor' => $row['nombreproveedor'],
                'idadscripcion' => $row['idadscripcion'],
                'descadscripcion' => $row['descadscripcion']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>