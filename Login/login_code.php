<?php
    include ("../conexion/conexion.php");    
    $bd = new Conexion();
    session_start();
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass = sha1($pass);
    $arraySingle="";
    
    $query = "call sp_login('$user','$pass')";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {
            
            if($row["idusuario"] > 0){
                $_SESSION["idusuario"] = $row["idusuario"];
                $_SESSION["idempleado"] = $row["idempleado"];                
                $_SESSION["nombre"] = $row["quien"];
                $_SESSION["nombre_database"] = $row["nombre_database"];
                $_SESSION["nombreCompleto"] = $row["nombre"];
                $_SESSION["iddepartamento"] = $row["iddepartamento"];
                $_SESSION["idregion"] = $row["idregion"];
                $_SESSION["idsesion"] = $row["idsesion"];   
                $_SESSION["idadscripcion"] = $row["idadscripcion"];               
            }                    

            $arraySingle = array(
                'mensaje' => $row["mensaje"],
                'idusuario' => $row["idusuario"],
                'idsesion' => $row["idsesion"],
                'idempleado' => $row["idempleado"],
                'iddepartamento' => $row["iddepartamento"],
                'idregion' => $row["idregion"],
                'quien' => $row["quien"],
                'nombre_database' => $row["nombre_database"],                
                'nombre' => $row["nombre"],
                'idadscripcion' => $row["idadscripcion"]
            );
            
            
        }
        echo json_encode($arraySingle);
    }
?>