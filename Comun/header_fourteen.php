<?php 
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Login/");
    }
?>


<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link rel="icon" type="image/jpeg" href="../img/buhosolo.png"/>

    <title>KATSA</title>

    <link rel="stylesheet" type="text/css" href="../js_css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../js_css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="../js_css/datatable/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="../Comun/navbar.css">

    <style type="text/css">  
    .ui.segment{
            border-color: #4abdac !important;        
        }
    </style>

    <script src="../js_css/jquery-3.1.1.min.js"></script>    

    <script src="../js_css/semantic.min.js"></script>
    <script src="../js_css/nprogress.js"></script>
    <script src="../js_css/datatable/jquery.dataTables.min.js"></script>
    <script src="../js_css/datatable/dataTables.semanticui.min.js"></script>
    
    <script src="../Comun/funciones.js"></script>
</head>

<body>

    <?php include("../Comun/modal_cambiar_pass.php");?>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu" id="attachSideBarMenu">
        
    </div>

    <div class="pusher">

        <div class="ui fluid three item menu menu_mostrar">
            <div class="item">
                <i class="bars icon" id="sidebarMenu"></i>
            </div>
            <div class="header item">
                KATSA
            </div>
            <div class="item">
                <small><?php echo $_SESSION["nombreCompleto"]?></small>
            </div>            
        </div>
        
        <div class="ui masthead vertical segment menu_ocultar">
            <div class="ui grid container">

                <div class="row">
                    <div class="two wide column">
                        <div class="advertisement">
                            <img class="ui small fluid image" src="../img/logo.png">
                        </div>
                    </div>
                    <div class="seven wide column">
                        
                    </div>
                    <div class="five wide column">
                        <div class="item">                        
                            <div class="content">
                                <div class="ui sub header">
                                    <?php echo $_SESSION["nombreCompleto"]?>
                                </div>
                                <?php //echo $_SESSION["puesto"]?>
                                <?php echo $_SESSION["nombre_database"]?>
                            </div>
                        </div>                    
                    </div>
                    <div class="two wide column">
                        <button class="ui basic icon button" onclick="abrir_modal_cambiar_pass();"><i class="user secret icon"></i></button>
                        <button class="ui basic red icon button" onclick="logOut();"><i class="sign-out icon"></i></button>                        
                    </div>
                </div>
            </div>
        </div>    

        <div class="ui fluid ten item menu menu_navbar menu_ocultar" id="menu_principal">
        </div>

        <div class="ui hidden divider"></div>

        <div class="ui stackable grid">
            <div class="row">
                <div class="one wide column"></div>
                <div class="fourteen wide column">