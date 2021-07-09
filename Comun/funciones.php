<?php
require_once '../mpdf/vendor/autoload.php';
require '../mpdf/vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../mpdf/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../mpdf/vendor/PHPMailer/PHPMailer/src/SMTP.php';
/*
Funcion que ayuda a formatear los campos para ser insertados en la base de datos.
Si el campo es un numero debera llevar como parametro un 1
Si el campo es un string debera llevar como parametro un 0
Si el campo es vacio devolvera un NULL.
*/
function form2insert($campo,$numero){
    $formCam = "";
    $size = strlen($campo);

    if($size == 0){
        $formCam = "NULL";
    }else if($size > 0 && $numero == 1){
        $formCam = "$campo";
    }else if($size > 0 && $numero == 0){
        $formCam = "'$campo'";
    }

    return $formCam;
}

//solicitud -> 'R' = Requisicion, 'V' = Viaticos, 'O' = Otros
function get_params($solicitud){
    $bd_params = new Conexion();

    $query = '';

    if ($solicitud == 'R'){
        $query = "call sp_datoscorreocompras();";
    }else if($solicitud == 'V'){
        $query = "call sp_datoscorreogastos();";
    }else{
        $query = "call sp_datoscorreocompras();";
    }


    $result = $bd_params->query($query);

    $host = '';
    $cuenta = '';
    $nombre = '';
    $username = '';
    $password = '';
    $puerto = '';

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {
            $host = $row['host'];
            $cuenta = $row['cuenta'];
            $nombre = $row['nombre'];
            $username = $row['username'];
            $password = $row['password'];
            $puerto = $row['puerto'];
        }
        
    }

    $arraySingle = array(
        'host' => $host,
        'cuenta' => $cuenta,
        'nombre' => $nombre,
        'username' => $username,
        'password' => $password,
        'puerto' => $puerto        
    );    

    return $arraySingle;
}

/*
Funcion que ayuda a mandar un mail con o sin archivos
*/
function sendMail($mailRecibe,$nombreRecibe,$asunto,$contenido,
                    $archivos = [],                    
                    $solicitud)
{        

    $params = get_params($solicitud);	

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                  // Enable verbose debug output
        $mail->isSMTP();                                                            // Send using SMTP
        $mail->Host       = $params['host'];//'mail.estudiojuridicoronado.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                                   // Enable SMTP authentication
        $mail->Username   = $params['username'];//'estuds6q';                                             // SMTP 
        $mail->Password   = $params['password'];//'Hz7@DzeeE70X';                                         // SMTP password
        //$mail->SMTPSecure = 'ssl';                                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged        
        $mail->Port       = $params['puerto'];//465;                                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above 
        $mail->CharSet = 'UTF-8';

        $mailEnvia = $params['cuenta'];
        $nombreEnvia = $params['nombre'];

        $mail->setFrom($mailEnvia, $nombreEnvia);
        $mail->addAddress($mailRecibe, $nombreRecibe);

        //Total de archivos a mandar
        for($i = 0 ; $i < count($archivos) ; $i++){
            for($j = 0 ; $j < 2 ; $j++){//Es dos porque sera la ruta y el nombre
                // $archivos[$i][0] -> Ruta del archivo
                // $archivos[$i][1] -> Nombre del archivo
                $mail->addAttachment($archivos[$i][0], $archivos[$i][1]);
            }
        }                

        // Content
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = $contenido;

        $arraySingle = array(
            'host'  => $params['host'],
            'username'  => $params['username'],
            'password'  => $params['password'],
            'puerto'  => $params['puerto'],
            'mail_envia' => $mailEnvia,
            'mail_recibe' => $mailRecibe
        );

        print_r($arraySingle);
        echo "<br><br><br><br><br>";

        $result = $mail->send();
        
        if ($result){
            //echo 'Message has been sent to '.$replyto.' -> ';
            return $arraySingle;
        }else{
            //echo 'The message has not been sent';
            return $arraySingle;
        }
        
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return $arraySingle;
    }


}

/*
Funcion que devuelve una pagina HTML formateada como string para poder mostrar contenido de summernote
utilizado como reporteador en este proyecto
*/
function SummerReporter($contenido){
    $reporte = '';

    $reporte .= '<!DOCTYPE html>
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
    $reporte .=  $contenido;
    $reporte .= '</div>
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

    return $reporte;
}

/*
    Funcion que manda un mail para revisar o autorizar una solicitud
    id -> id de requisicion o de viaticos
    solicitud -> 'R' = Requisicion, 'V' = Viaticos
    accion -> 'R' = Revisa, 'A' = Autoriza
*/
function correo_autorizar($id,$solicitud,$accion){
    $bd_correo = new Conexion();

    if ($solicitud == 'R'){
        $query = "call sp_fmt_correoautorizarequisicion($id,'$accion');";
    }else if($solicitud == 'V'){
        $query = "call sp_fmt_correoautorizagastos($id,'$accion');";
    }

    $result = $bd_correo->query($query);

    $contenido = '';
    $asunto = array();
    $nombre_completo = array();
    $correo = array();

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_array()) {        

            $contenido = $row['formatolegal'];
            $correo[] = $row['correo'];
            $asunto[] = $row['asunto'];
            $nombre_completo[] = $row['empleado'];
        }
        
    }

    $reporte = SummerReporter($contenido);

    $se_envio = '';
    $archivos = [];
    
    $mailEnvia = 'mice6711@gmail.com';
    //$nombreEnvia = 'Eduardo Mireles';

    for($i = 0; $i < count($correo); $i++){            
        $se_envio = sendMail($mailEnvia,$nombre_completo[$i],$asunto[$i],$reporte,$archivos,$solicitud);
    }       

    return $se_envio;

}
?>
