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
$margensuperior = $_POST['margensuperior'];
$margeninferior = $_POST['margeninferior'];
$margenizquierdo = $_POST['margenizquierdo'];
$margenderecho = $_POST['margenderecho'];
$store = $_POST['store'];

$contenido = '';
$html = '';
$arraySingle = [];

$bd2 = new Conexion();
$bd = new Conexion();
$mpdf = new \Mpdf\Mpdf([
    'format' => 'Legal',
    'margin_left' => $margenizquierdo,
    'margin_right' => $margenderecho,
    'margin_top' => $margensuperior,
    'margin_bottom' => $margeninferior
    ]);
array_map('unlink', glob("CartaCitatorio/*.pdf"));

$query = "call ".$store."(".$valor.")";


$result = $bd2->query($query);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_array()) {
        $formato = $row["formatolegal"];
        $dumyC = $formato;            
        
        
        $html .= '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <title>Summernote</title>
          <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
          <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
          <link href="../js_css/editor/summernote-lite.css" rel="stylesheet">
          <script src="../js_css/editor/summernote-lite.js"></script>
          <script src="../js_css/editor/lang/summernote-es-ES.js"></script>
        </head>
        <body>
          <div id="summernote">';
        $html .=  $dumyC;
        $html .= '</div>
        <script>
          $(document).ready(function() {
              $("#summernote").summernote({
                  lang: "es-ES",
                  airMode: true,
                  toolbar: [
                      ["style", ["style"]],
                      ["font", ["bold", "underline", "clear"]],
                      ["fontsize", ["fontsize"]],                
                      ["fontname", ["fontname"]],
                      ["color", ["color"]],
                      ["para", ["ul", "ol", "paragraph"]],
                      ["table", ["table"]],
                      ["insert", ["link", "picture", "video"]],
                      ["view", ["fullscreen", "codeview", "help"]],
                  ],
                  fontSizes: ["8", "9", "10", "11", "12", "14", "18", "24", "36", "48" , "64", "82", "150"]
              });
          });
        </script>
      </body>
      </html>';        
        
        $mpdf->WriteHTML($html);
        //echo $html;
        //Genera el fichero y fuerza la descarga
        //$mpdf->Output();
        $mpdf->Output('CartaCitatorio/'.str_replace(" ","",$row["nombrecompleto"]).'.pdf');
        $arraySingle[] = str_replace(" ","",$row["nombrecompleto"]);
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