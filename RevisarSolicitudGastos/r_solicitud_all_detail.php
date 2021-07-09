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

    $arrayTodo = array();    

    $idsolicitud = form2insert($_POST['idsolicitud'],1);

    $query = "call sp_gastoscomprobar_sel($idsolicitud);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idgastoscomprobar' => $row['idgastoscomprobar'],
                'tipogasto' => $row['tipogasto'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'fecharevision' => $row['fecharevision'],
                'fechaautorizacion' => $row['fechaautorizacion'],
                'fechacancelacion' => $row['fechacancelacion'],
                'importetotal' => $row['importetotal'],
                'idestatus' => $row['idestatus'],
                'descestatus' => $row['descestatus'],
                'idempleadosolicita' => $row['idempleadosolicita'],
                'empleadosolicita' => $row['empleadosolicita'],
                'idempleadobeneficiario' => $row['idempleadobeneficiario'],
                'empleadobeneficiario' => $row['empleadobeneficiario'],
                'idregion' => $row['idregion'],
                'descregion' => $row['descregion'],
                'iddepartamento' => $row['iddepartamento'],
                'descdepartamento' => $row['descdepartamento'], 
                'idempleadorevisa' => $row['idempleadorevisa'],
                'empleadorevisa' => $row['empleadorevisa'],
                'idempleadoautoriza' => $row['idempleadoautoriza'],
                'empleadoautoriza' => $row['empleadoautoriza'],
                'observaciones' => $row['observaciones'],
                'fechaentrega' => $row['fechaentrega'],
                'referenciaentrega' => $row['referenciaentrega'],
                'fechalimitecomprobacion' => $row['fechalimitecomprobacion'],
                'fechacomprobacion' => $row['fechacomprobacion'],
                'importecomprobado' => $row['importecomprobado'],
                'idcuentabancaria' => $row['idcuentabancaria'],
                'numerocuenta' => $row['numerocuenta'],
                'comentariosconciliacion' => $row['comentariosconciliacion'],
                'idcliente' => $row['idcliente'],
                'nombrecliente' => $row['nombrecliente'],
                'idpartida' => $row['idpartida'],
                'descpartida' => $row['descpartida'],
                'importe' => $row['importe'],
                'justificacion' => $row['justificacion'],
                'correo' => $row['correobeneficiario'],
                'lugarviaje' => $row['lugarviaje'],
                'idtipoviaje' => $row['idtipoviaje'],
                'desctipoviaje' => $row['desctipoviaje'],
                'motivoviaje' => $row['motivoviaje'],
                'diasviaje' => $row['diasviaje'],
                'fechainicial' => $row['fechainicial'],
                'fechafinal' => $row['fechafinal'],
                'distanciakms' => $row['distanciakms'],
                'idadscripcion' => $row['idadscripcion'],
                'descadscripcion' => $row['descadscripcion'],
                'cantidad' => $row['cantidad'],
                'observacionesrevision' => $row['observacionesrevision'],
                'totalpartida' => $row['totalpartida'],
                'cantidadautoriza' => $row['cantidadautoriza'],
                'importeautoriza' => $row['importeautoriza'],
                'totalautoriza' => $row['totalautoriza']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>