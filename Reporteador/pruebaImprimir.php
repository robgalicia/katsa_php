<?php
require_once '../mpdf/vendor/autoload.php';
include ("../conexion/conexion.php");
include ("../Comun/funciones.php");
 
session_start();

if(!isset($_SESSION["idusuario"])){
    header("Location: ../Inicio/");
}

$bd2 = new Conexion();

$quien = $_SESSION["nombre"];

$valor = $_POST['id'];
$clave = $_POST['clave'];
$deDonde = $_POST['deDonde'];


$margensuperior = "";
$margeninferior = "";
$margenizquierdo = "";
$margenderecho = "";
$storeprocedure = "";


$query2 = "call sp_formatolegal_sel($clave);";
$result2 = $bd2->query($query2);

if ($result2->num_rows > 0) {

  while ($row = $result2->fetch_array()) {
    $margensuperior = $row["margensuperior"];
    $margeninferior = $row["margeninferior"];
    $margenizquierdo = $row["margenizquierdo"];
    $margenderecho = $row["margenderecho"];
    $storeprocedure = $row["storeprocedure"];
  }
}

$contenido = '';
$html = '';
$arraySingle = [];

//$bd3 = new Conexion();
$bd = new Conexion();
$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4',
    'margin_left' => $margenizquierdo,
    'margin_right' => $margenderecho,
    'margin_top' => $margensuperior,
    'margin_bottom' => $margeninferior
    ]);
//array_map('unlink', glob("CartaCitatorio/*.pdf"));

$query = 'call '.$storeprocedure.'('.$valor.');';
//$queryDT = 'call '.$storedatatable.'();';

$result = $bd->query($query);

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
    }    
}


$mpdf->WriteHTML($html);
//echo $html;
//Genera el fichero y fuerza la descarga
//$mpdf->Output();
$nombreFile = GUID();

$mpdf->Output("../".$deDonde."pdf/".$nombreFile.".pdf");
$arraySingle[] = $nombreFile;

//idagendaexpediente,idestatus,idestatusexp,fechacumplimiento,actividadresultado,fechaactividad,observaciones,quien
//$query2 = "call sp_agendaexpediente_upd($agenda,3,3,now(),$actividad,NULL,NULL,'$quien')";
//$result2 = $bd->query($query2);

echo json_encode($arraySingle);


/*-------------------------------------------------------------------*/
/*-------------------------------------------------------------------*/
/*-------------------------------------------------------------------*/
/*-------------------------------------------------------------------*/

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

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
