<?php 

$apiKey = 'YOUR-API-KEY';
$recipients = '+123456789';
$message = 'Hello from SMS Mobile API PHP SDK!';

// Send a scheduled message via WhatsApp and SMS.
//$scheduleTimestamp = strtotime('+1 hour'); //Scheduled in 1 hour (GMT 0).
$scheduleTimestamp = "";

require_once __DIR__ . '/smsmobileapi-php/vendor/autoload.php';

use SMSMobileAPI\SMSMobileAPI;
$smsAPI = new SMSMobileAPI($apiKey);

// Vérifier si la classe et la méthode existent
if (!class_exists('SMSMobileAPI\SMSMobileAPI')) {
    die('❌ Class SMSMobileAPI not found!');
}
if (!method_exists($smsAPI, 'sendMessage')) {
    die('❌ Method sendMessage() not found in SMSMobileAPI class!');
}

$response = $smsAPI->sendMessage(
    $recipients, 
    $message, 
    false,  // Send via WhatsApp
    true, // Send aussi en SMS
    $scheduleTimestamp
);

// Affichage de la réponse
echo "<pre>";
print_r($response);
echo "</pre>";

?>


