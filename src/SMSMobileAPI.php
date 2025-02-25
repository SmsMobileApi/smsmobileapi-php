<?php

namespace SMSMobileAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SMSMobileAPI
{
    private $apiKey;
    private $client;
    private $apiUrl = 'https://api.smsmobileapi.com/sendsms';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'timeout'  => 10.0, // Timeout de 10 secondes
        ]);
    }

    public function sendMessage(
        string $recipients,
        string $message,
        bool $sendWA = false, // Envoyer via WhatsApp ?
        bool $sendSMS = true,  // Envoyer en SMS (false = désactivé)
        ?int $scheduleTimestamp = null // Planification d'envoi (timestamp UNIX GMT 0)
    ) {
        try {
            // Préparation des données POST
            $postData = [
                'apikey' => $this->apiKey,
                'recipients' => $recipients,
                'message' => $message,
                'sendwa' => $sendWA ? 1 : 0,
                'sendsms' => $sendSMS ? 1 : 0
            ];

            // Ajouter la planification si fournie
            if ($scheduleTimestamp !== null) {
                $postData['schedule_timestamp'] = $scheduleTimestamp;
            }

            // Envoi de la requête HTTP POST
            $response = $this->client->post($this->apiUrl, [
                'form_params' => $postData
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}
