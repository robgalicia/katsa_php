<?php
require_once '../mpdf/vendor/autoload.php';
include ("../conexion/conexion.php");
include ("../Comun/funciones.php");
 
session_start();

if(!isset($_SESSION["idusuario"])){
    header("Location: ../Inicio/");
}

$quien = $_SESSION["nombre"];

$valor = $_POST['id'];
$clave = $_POST['clave'];

$actividad = $_POST['resultado'];
$agenda = $_POST['idagenda'];

$contenido = '';
$html = '';
$arraySingle = [];

$bd2 = new Conexion();
$bd = new Conexion();
$mpdf = new \Mpdf\Mpdf(['format' => 'Legal', 'margin_left' => '35']);
array_map('unlink', glob("CartaCitatorio/*.pdf"));

switch ($clave) {
    case '001':
        $query = "call sp_cartacitatorio($valor);"; //Carta Citatorio
        break;    
    case '002':
        $query = "call sp_demandamercantil($valor);"; //Carta Citatorio    
        break;
    case '003':
        $query = "call sp_demandamercantil($valor);"; //IMPRIMIR ESCRITO CORRECCION DOMICILIO
        break;
}

$result = $bd2->query($query);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_array()) {        
        $formato = $row["formatolegal"];            
        $dumyC = $formato;            
        
        
        $html .= '<!DOCTYPE html>
        <html>
        
        <head>
            <!-- Standard Meta -->
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">    
        
            <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
        
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        
        
            <!-- Include the Quill library -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>            
            
        </head>
        
        <body>
        
            <div id="editor">';
        $html .=  $dumyC;
        $html .= '</div>
            
        
            <script>
                $(document).ready(function() {
        
                    var toolbarOptions = [
                        ["bold", "italic", "underline", "strike"],        // toggled buttons
                        ["blockquote", "code-block"],
        
                        [{ "header": 1 }, { "header": 2 }],               // custom button values
                        [{ "list": "ordered"}, { "list": "bullet" }],
                        [{ "script": "sub"}, { "script": "super" }],      // superscript/subscript
                        [{ "indent": "-1"}, { "indent": "+1" }],          // outdent/indent
                        [{ "direction": "rtl" }],                         // text direction
        
                        [{ "size": ["small", false, "large", "huge"] }],  // custom dropdown
                        [{ "header": [1, 2, 3, 4, 5, 6, false] }],
        
                        [ "link", "image", "video", "formula" ],
        
                        [{ "color": [] }, { "background": [] }],          // dropdown with defaults from theme
                        [{ "font": [] }],
                        [{ "align": [] }],
        
                        ["clean"]                                         // remove formatting button
                    ];		
        
                    quill = new Quill("#editor", {	
                        modules: {
                            toolbar: toolbarOptions
                        },
                        theme: "bubble"
                    });            
                });
            </script>
        </body>';        
        
        $mpdf->WriteHTML($html);
        //echo $html;
        //Genera el fichero y fuerza la descarga
        //$mpdf->Output();
        $mpdf->Output('CartaCitatorio/'.$row["nombrecompleto"].'.pdf');
        $arraySingle[] = $row["nombrecompleto"];

        //idagendaexpediente,idestatus,idestatusexp,fechacumplimiento,actividadresultado,fechaactividad,observaciones,quien
        $query2 = "call sp_agendaexpediente_upd($agenda,3,3,now(),$actividad,NULL,NULL,'$quien')";

        $result2 = $bd->query($query2);        

    }    
}

echo json_encode($arraySingle);
//$html = '<h1>HOLA REPORTEADOR</h1>';

// La variable $html es vuestro código que queréis pasar a PDF
//$html = utf8_encode($html);

//$mpdf->WriteHTML($html);

//Genera el fichero y fuerza la descarga
//$mpdf->Output();
//$mpdf->Output('nombre.pdf','D'); exit;

function toMoney($val,$symbol='$',$r=2)
{
    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = count($i)) > 3) ? $j % 3 : 0; 

    return  $symbol.$sign . ($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" . $t,substr($i,$j));
}
?>