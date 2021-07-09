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
    
    $idconsumogasolina = form2insert($_POST['idconsumogasolina'],1);    
    

    /*$quien = '';
    if($movil){
        $quien = form2insert($_POST["quien"],0);
    }else{
        $quien = form2insert($_SESSION["nombre"],0);
    }*/
    $arrayTodo = array();


    $query = "call sp_consumogasolina_del(        
        $idconsumogasolina
    )";

    $result = $bd->query($query);
    
    $arraySingle = array(        
        'query' => $query,
        'result' => $result
    );

    echo json_encode($arraySingle);
?>