# SMSMobileAPI PHP SDK

SMS Mobile API is a PHP SDK that allows developers to send SMS and WhatsApp messages via the SMS Mobile API.

## Prerequisite: Install the SMS Mobile API App

Before using this SDK, you must first install the SMS Mobile API mobile app on your Android or iOS device. This app is required to connect your phone to the API for sending and receiving SMS messages.

- Download SMS Mobile API for Android: https://play.google.com/store/apps/details?id=com.smsmobileapiapp
- Download SMS Mobile API for iOS: https://apps.apple.com/us/app/sms-mobile-api/id6667092442

Once the app is installed and configured, you can obtain your API key from within the app to use with this PHP SDK.

- How to use the SDK and examples: https://smsmobileapi.com/php

## Installation

Use Composer to install the SDK:

composer require smsmobileapi/smsmobileapi-php


## Features

- Send SMS: Easily send SMS messages using a simple PHP function
- Send WhatsApp Messages: Send messages via WhatsApp
- Easy Integration: Integrates with your PHP applications with minimal setup
- API Key Authentication: Secure communication through API key-based authentication

## Usage Example

```php
require 'vendor/autoload.php';

use SMSMobileAPI\SMSMobileAPI;

$apiKey = 'YOUR_API_KEY'; 
$smsAPI = new SMSMobileAPI($apiKey);

// Send an SMS
$response = $smsAPI->sendMessage(
    '+123456789',  // Recipient
    'Hello from SMS Mobile API PHP SDK!',  // Message
    sendWA: true,  // Send via WhatsApp
    sendSMS: true  // Also send as SMS
);

print_r($response);
```


## Documentation

For full API documentation and more examples, visit:
https://smsmobileapi.com/doc

## License

This SDK is open-source and licensed under the MIT License.

Now you can integrate SMS and WhatsApp messaging into your PHP applications effortlessly!


