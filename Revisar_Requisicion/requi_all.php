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

    $quien = '';
    $idempleado = 0;
    if($movil){
        $quien = form2insert($_POST["quien"],0);
        $idempleado = $_POST['idempleado'];
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
        $idempleado = $_SESSION['idempleado'];
    }

    $idregion = form2insert($_POST['idregion'],1);
    $iddepartamento = form2insert($_POST['iddepartamento'],1);
    
    $anio = form2insert($_POST['anio'],1);
    $mes = form2insert($_POST['mes'],1);
    $estatus = form2insert($_POST['estatus'],0);

    $query = "call sp_requisicion_all($idregion,$iddepartamento,0,$anio,$mes,$estatus);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(                                
                'idrequisicion' => $row['idrequisicion'],
                'folio' => $row['folio'],
                'fecha' => $row['fecha'],
                'fecharevision' => $row['fecharevision'],
                'fechaautorizacion' => $row['fechaautorizacion'],
                'fechacancelacion' => $row['fechacancelacion'],
                'importetotal' => $row['importetotal'],
                'tiporequisicion' => $row['tiporequisicion'],
                'descestatus' => $row['descestatus']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>