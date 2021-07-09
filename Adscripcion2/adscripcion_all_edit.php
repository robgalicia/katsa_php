<?php
    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }    

    $arrayTodo = array();

    $id = $_POST["id_ad_g"];

    $query = "call sp_adscripcion_sel($id);";

    $result = $bd->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $arraySingle = array(
                'idadscripcion' => $row["idadscripcion"],

                'desadscripcion' => $row["descadscripcion"],

                'idregion' => $row["idregion"],

                'ubicacion' => $row["ubicacion"],

                'fechainicio' => $row["fechainicio"],

                'fechabaja' => $row["fechabaja"],

                'calle' => $row["calle"],

                'numexterior' => $row["numexterior"],

                'numinterior' => $row["numinterior"],

                'entrecalle' => $row["entrecalle"],

                'ylacalle' => $row["ylacalle"],

                'colonia' => $row["colonia"],

                'codigopostal' => $row["codigopostal"],

                'ciudad' => $row["ciudad"],

                'idmunicipio' => $row["idmunicipio"],

                'idestado' => $row["idestado"],

                'personacontacto' => $row["personacontacto"],

                'telefonocontacto' => $row["telefonocontacto"],

                'correoelectronico' => $row["correoelectronico"]
            );

            $arrayTodo[] = $arraySingle;            
        }
        echo json_encode($arrayTodo);
    }
?>

