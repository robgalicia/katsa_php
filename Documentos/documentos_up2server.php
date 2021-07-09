<?php

    include ("../conexion/conexion.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }

    $ds = DIRECTORY_SEPARATOR;
     
    $storeFolder = '../Files';

    $name = '';
     
    if (!empty($_FILES)) {
         
        $tempFile = $_FILES['file']['tmp_name'];
          
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
         
        $targetFile =  $targetPath . $_FILES['file']['name'];
     
        move_uploaded_file($tempFile,$targetFile);

        $info = new SplFileInfo($_FILES['file']['name']);
        $info = $info->getExtension();

        //echo $tempFile . '   ' . $targetFile . '     ' . $_FILES['file']['name'] . '      ' . $_POST["id"];
        $name = "../Files/".GUID().'.'.$info;
        //old,new        
        rename ("../Files/".$_FILES['file']['name'], $name);
        

        /*
        $id = $_POST["id"];
        $tipodoc = $_POST["tipodoc"];
        $quien = $quien = $_SESSION["nombre"];

        $status = '';

        if (file_exists($name)) {
            $query = "call sp_clienteexpedientedoc_ups(0,$id,$tipodoc,'$name','$quien',@lastid)";
            $result = $bd->query($query);
            $status = 'true';
        } else {
            $status = 'false';
        }
        */       
            
        $arraySingle = array(            
            'nombre' => $name
        );
                    
        echo json_encode($arraySingle);

    }

    function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
?>