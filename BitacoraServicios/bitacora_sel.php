<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();    

    $pidordenservicio = form2insert($_POST['idordenservicio'],1);

    $query = "call sp_ordenservicio_sel($pidordenservicio);";
    
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idordenservicio' => $row['idordenservicio'],
                'folio' => $row['folio'],
                'numeroacta' => $row['numeroacta'],
                'fechainicio' => $row['fechainicio'],
                'idregion' => $row['idregion'],
                'idcotizacion' => $row['idcotizacion'],
                'idcliente' => $row['idcliente'],
                'folioordencompra' => $row['folioordencompra'],
                'fechaordencompra' => $row['fechaordencompra'],
                'idservicio' => $row['idservicio'],
                'lugarservicio' => $row['lugarservicio'],
                'numelementos' => $row['numelementos'],
                'tipoturno' => $row['tipoturno'],
                'rechabvehiculo' => $row['rechabvehiculo'],
                'rechabvehiculotipo' => $row['rechabvehiculotipo'],
                'rechabequipocom' => $row['rechabequipocom'],
                'rechabequipocomtipo' => $row['rechabequipocomtipo'],
                'rechabgps' => $row['rechabgps'],
                'rechabgpstipo' => $row['rechabgpstipo'],
                'rechabcasetavig' => $row['rechabcasetavig'],
                'rechabcasetavigtipo' => $row['rechabcasetavigtipo'],
                'rechabgenelectrico' => $row['rechabgenelectrico'],
                'rechabgenelectricotipo' => $row['rechabgenelectricotipo'],
                'rechabmediorest' => $row['rechabmediorest'],
                'rechabmedioresttipo' => $row['rechabmedioresttipo'],
                'fechaterminacion' => $row['fechaterminacion'],
                'observaciones' => $row['observaciones']

            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>