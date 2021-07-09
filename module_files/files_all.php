<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }   

    $arrayTodo = array();

    $clavedoctomodulo = form2insert($_POST['clavedoctomodulo'],0);
    $idcampollave = form2insert($_POST['idcampollave'],1);
    
    $query = "call sp_doctoarchivodocumento_sel($clavedoctomodulo, $idcampollave)";
    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {

            $arraySingle = array(
                'iddoctomodulo' => $row['iddoctomodulo'],
                'iddoctotipodocumento' => $row['iddoctotipodocumento'],
                'descdoctotipodocumento' => $row['descdoctotipodocumento'],
                'iddoctoarchivodocumento' => $row['iddoctoarchivodocumento'],
                'nombrearchivodocumento' => $row['nombrearchivodocumento'],
                'nombrearchivouuid' => $row['nombrearchivouuid']
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>