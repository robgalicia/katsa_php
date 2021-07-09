<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }

    $arraySingle = array();
    
    $quien = $_SESSION["nombre"];
    
    $password_nuevo = sha1($_POST['password_nuevo']);

    //Se puso asi para que la variable fuera visible    
    $idusuario; if(strlen($_POST['idusuario']) == 0) $idusuario = 'NULL'; else $idusuario = $_POST['idusuario'];
    $login; if(strlen($_POST['login']) == 0) $login = 'NULL'; else $login = $_POST['login'];
    $password; if(strlen($_POST['password']) == 0) $password = 'NULL'; else $password = sha1($_POST['password']);
    $nombre; if(strlen($_POST['nombre']) == 0) $nombre = 'NULL'; else $nombre = $_POST['nombre'];
    $fechaalta; if(strlen($_POST['fechaalta']) == 0) $fechaalta = 'NULL'; else $fechaalta = $_POST['fechaalta'];
    $fechabaja; if(strlen($_POST['fechabaja']) == 0) $fechabaja = 'NULL'; else $fechabaja = $_POST['fechabaja'];
    $idempleado; if(strlen($_POST['idempleado']) == 0) $idempleado = 'NULL'; else $idempleado = $_POST['idempleado'];    
        
    $exec = true;

    if( ($idusuario > 0) && (strlen($password_nuevo) > 0) ){        
        $password = $password_nuevo;    
    }


    if($exec){
        $query ="CALL sp_usuario_ups";
        $query .="($idusuario,";
        if($login == 'NULL') $query .= $login.","; else $query .= "'$login',";
        if($password == 'NULL') $query .= $password.","; else $query .= "'$password',";
        if($nombre == 'NULL') $query .= $nombre.","; else $query .= "'$nombre',";
        if($fechaalta == 'NULL') $query .= $fechaalta.","; else $query .= "'$fechaalta',";
        if($fechabaja == 'NULL') $query .= $fechabaja.","; else $query .= "'$fechabaja',";
        if($idempleado == 'NULL') $query .= $idempleado.","; else $query .= "$idempleado,";    
        $query .="'$quien',@lastid)";

        $result = $bd->query($query);    
        
        $arraySingle = array(
            'mensaje' => 'ok',
            'result' => $result,
            'query' => $query
        );
    }else{
        $arraySingle = array(
            'mensaje' => 'Las contraseñas no coinciden',
            'result' => false,
            'query' => ""
        );
    }
    

    echo json_encode($arraySingle);
?>