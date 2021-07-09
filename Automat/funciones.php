<?php
require_once '../mpdf/vendor/twilio-php-main/src/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACfaf08fef04e56f21d8a93452a8175d48';
$token = '86a7b902b5c1d0992dc94cdbded05a21';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$message = $client->messages->create(
    // the number you'd like to send the message to
    //'+528342815425', //Nicole
    '+528341048168',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12064523107',
        // the body of the text message you'd like to send
        'body' => "Hola amor, te quiero <3"
    ]
);

print_r($message);

?>
