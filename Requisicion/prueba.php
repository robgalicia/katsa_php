<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    include ("../Comun/mail_to_autorizar.php");

    $last = 2;
    $se_envio = correo_autorizar($last,'R','R');
    echo $se_envio;

?>