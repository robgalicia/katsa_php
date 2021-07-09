<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $id = $_POST['tipo'];
    
    $query = "call sp_empleado_edofuerza($id)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idempleado' => $row['idempleado'],
                'descestatus' => $row['descestatus'],
                'empresa' => $row['empresa'],
                'entidad' => $row['entidad'],
                'municipio' => $row['municipio'],
                'nombrecliente' => $row['nombrecliente'],
                'descadscripcion' => $row['descadscripcion'],
                'conclusionservicio' => $row['conclusionservicio'],
                'nombreempleado' => $row['nombreempleado'],
                'sueldonetomensual' => $row['sueldonetomensual'],
                'puestotabulador' => $row['puestotabulador'],
                'puestoorganigrama' => $row['puestoorganigrama'],
                'funcionespuesto' => $row['funcionespuesto'],
                'puestoregistro' => $row['puestoregistro'],
                'requiereregsnsp' => $row['requiereregsnsp'],
                'estatusregsnsp' => $row['estatusregsnsp'],
                'capbasica' => $row['capbasica'],
                'capseginmuebles' => $row['capseginmuebles'],
                'capmanejodefensivo' => $row['capmanejodefensivo'],
                'capprimerosauxilios' => $row['capprimerosauxilios'],
                'cuip' => $row['cuip'],
                'curp' => $row['curp'],
                'rfc' => $row['rfc'],
                'numimss' => $row['numimss'],
                'gruposanguineo' => $row['gruposanguineo'],
                'fechaalta' => $row['fechaalta'],
                'fechabaja' => $row['fechabaja'],
                'vehiculoasignado' => $row['vehiculoasignado'],
                'marcasubmarca' => $row['marcasubmarca'],
                'placas' => $row['placas'],
                'gasolina' => $row['gasolina'],
                'diesel' => $row['diesel'],
                'consumomes' => $row['consumomes'],
                'modalidadasigna' => $row['modalidadasigna'],
                'propietarioveh' => $row['propietarioveh']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>