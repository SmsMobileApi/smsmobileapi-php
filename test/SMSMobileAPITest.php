<?php

require 'vendor/autoload.php';

use SMSMobileAPI\SMSMobileAPI;

$apiKey = 'YOUR_API_KEY';
$smsAPI = new SMSMobileAPI($apiKey);

$recipients = '+123456789';
$message = 'Hello from SMS Mobile API PHP SDK!';

// Send a scheduled message via WhatsApp and SMS.
//$scheduleTimestamp = strtotime('+1 hour'); //Scheduled in 1 hour (GMT 0).
$response = $smsAPI->sendMessage(
    $recipients, 
    $message, 
    false,  // Send via WhatsApp
    true, // Send aussi en SMS
    $scheduleTimestamp
);

print_r($response);
