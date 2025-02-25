<?php

require 'vendor/autoload.php';

use SMSMobileAPI\SMSMobileAPI;

$apiKey = 'YOUR_API_KEY';

$smsAPI = new SMSMobileAPI($apiKey);

// Vérifier si la classe et la méthode existent
if (!class_exists('SMSMobileAPI\SMSMobileAPI')) {
    die('❌ Class SMSMobileAPI not found!');
}
if (!method_exists($smsAPI, 'sendMessage')) {
    die('❌ Method sendMessage() not found in SMSMobileAPI class!');
}

// Définition des paramètres du message
$recipients = '+123456789';
$message = 'Hello from SMS Mobile API PHP SDK!';
$scheduleTimestamp = ""; // Planifié dans 1h (GMT 0)

// Envoi du message
$response = $smsAPI->sendMessage(
    $recipients,
    $message,
    true,  // Envoyer via WhatsApp
    true,  // Envoyer aussi en SMS
    $scheduleTimestamp
);

// Affichage de la réponse
echo "<pre>";
print_r($response);
echo "</pre>";
