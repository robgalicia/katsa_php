<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }

    $arraySingle = array();
    
    $idReporte = $_POST['idReporte'];
    $quien = $_SESSION["nombre"];

    //Se puso asi para que la variable fuera visible    
    $clave; if(strlen($_POST['clave']) == 0) $clave = 'NULL'; else $clave = $_POST['clave'];
    $nombre; if(strlen($_POST['nombre']) == 0) $nombre = 'NULL'; else $nombre = $_POST['nombre'];    
    $contenido; if(strlen($_POST['contenido']) == 0) $contenido = 'NULL'; else $contenido = $_POST['contenido'];

    $marDer; if(strlen($_POST['marDer']) == 0) $marDer = 'NULL'; else $marDer = $_POST['marDer'];
    $marIzq; if(strlen($_POST['marIzq']) == 0) $marIzq = 'NULL'; else $marIzq = $_POST['marIzq'];
    $marAl; if(strlen($_POST['marAl']) == 0) $marAl = 'NULL'; else $marAl = $_POST['marAl'];
    $MarBa; if(strlen($_POST['MarBa']) == 0) $MarBa = 'NULL'; else $MarBa = $_POST['MarBa'];
    $disparador; if(strlen($_POST['disparador']) == 0) $disparador = 'NULL'; else $disparador = $_POST['disparador'];

    $query ="CALL sp_formatolegal_ups";
    $query .="($idReporte,";
    if($clave == 'NULL') $query .= $clave.","; else $query .= "'$clave',";
    if($nombre == 'NULL') $query .= $nombre.","; else $query .= "'$nombre',";    
    if($contenido == 'NULL') $query .= $contenido.","; else $query .= "'$contenido',";

    $query .="'$quien',";
    
    if($marAl == 'NULL') $query .= $marAl.","; else $query .= "$marAl,";
    if($MarBa == 'NULL') $query .= $MarBa.","; else $query .= "$MarBa,";
    if($marIzq == 'NULL') $query .= $marIzq.","; else $query .= "$marIzq,";
    if($marDer == 'NULL') $query .= $marDer.","; else $query .= "$marDer,";
    if($disparador == 'NULL') $query .= $disparador.","; else $query .= "'$disparador',";

    $query .="@lastid)";

    $result = $bd->query($query);    
    
    $arraySingle = array(
        'mensaje' => 'ok',
        'result' => $result,
        'query' => $query
    );    

    echo json_encode($arraySingle);
?>