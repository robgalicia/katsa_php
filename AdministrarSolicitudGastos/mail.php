<?php
    include ("../conexion/conexion.php");
    include ("../Comun/funciones.php");
    $bd = new Conexion();
    session_start();

    if(!isset($_SESSION["idusuario"])){
        header("Location: ../Inicio/");
    }

    $idgastoscomprobar = $_POST['idgastoscomprobar'];
    $mailRecibe = $_POST['mail'];

    $query = "call sp_fmt_correogastoscomprobar($idgastoscomprobar);";

    $result = $bd->query($query);

    $contenido = '';
    $nombre_completo = '';

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $contenido = $row['formatolegal'];
            $nombre_completo = $row['nombrecompleto'];

        }
        
    }

    $reporte = SummerReporter($contenido);

    $archivos = [
        ['../AdministrarSolicitudGastos/pdf/POLITICA_DE_GASTOS_POR_COMPROBAR.pdf','POLITICA DE GASTOS POR COMPROBAR.pdf'],
        ['../AdministrarSolicitudGastos/pdf/POLITICA_DE_VIATICOS.pdf','POLITICA DE VIATICOS.pdf']
    ];

    $asunto = 'Gastos por Comprobar';    

    $se_envio = sendMail($mailRecibe,$nombre_completo,$asunto,$reporte,$archivos);

    $arraySingle = array(
        'query' => $query,
        'mailRecibe' => $mailRecibe,
        'se_envio' => $se_envio,
        'result' => $result
    );

    echo json_encode($arraySingle);

?>