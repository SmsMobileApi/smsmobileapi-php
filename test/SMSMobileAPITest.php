<?php

require 'vendor/autoload.php';

use SMSMobileAPI\SMSMobileAPI;

$apiKey = 'YOUR_API_KEY';
$smsAPI = new SMSMobileAPI($apiKey);

$recipients = '+123456789';
$message = 'Hello from SMS Mobile API PHP SDK!';

// Envoyer un message programmé via WhatsApp et SMS
$scheduleTimestamp = strtotime('+1 hour'); // Planifié dans 1h (GMT 0)

$response = $smsAPI->sendMessage(
    $recipients, 
    $message, 
    sendWA: true,  // Envoyer via WhatsApp
    sendSMS: true, // Envoyer aussi en SMS
    scheduleTimestamp: $scheduleTimestamp
);

print_r($response);
