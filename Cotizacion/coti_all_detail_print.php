<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();
    
    $idcotizacion = $_POST['idcotizacion'];    

    $query = "call sp_cotizacion_sel_print($idcotizacion);";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(                
                'idcotizacion' => $row['idcotizacion'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'lugarexpedicion' => $row['lugarexpedicion'],
                'asunto' => $row['asunto'],
                'idcliente' => $row['idcliente'], 
                'nombrecliente' => $row['nombrecliente'], 
                'personacontacto' => $row['personacontacto'],
                'personacopia' => $row['personacopia'],                
                'tiposervicio' => $row['tiposervicio'],
                'lugarservicio' => $row['lugarservicio'], 
                'ubicacionlugar' => $row['ubicacionlugar'],
                'idempleadofirma' => $row['idempleadofirma'],
                'idtipomoneda' => $row['idtipomoneda'],
                'desctipomoneda' => $row['desctipomoneda'],
                'fechainicio' => $row['fechainicio'],
                'fechafinal' => $row['fechafinal'],
                'idcotizaciondetalle' => $row['idcotizaciondetalle'],
                'idservicio' => $row['idservicio'],
                'descripcioncorta' => $row['descripcioncorta'],
                'descservicio' => $row['descservicio'],
                'cantidad' => $row['cantidad'],
                'preciounitario' => $row['preciounitario'],
                'importetotal' => $row['importetotal'],
                'fecha_formal' => $row['fecha_formal'],
                'nombrecompleto' => $row['nombrecompleto'],
                'descpuesto' => $row['descpuesto'],                
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>
