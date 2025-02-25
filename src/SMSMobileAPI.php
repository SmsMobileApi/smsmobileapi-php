<?php

namespace SMSMobileAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SMSMobileAPI
{
    private $apiKey;
    private $client;
    private $apiUrl = 'https://api.smsmobileapi.com/sendsms/';

    public function __construct($apiKey)
    {
        if (empty($apiKey)) {
            throw new \Exception("API key is required.");
        }

        $this->apiKey = $apiKey;
        $this->client = new Client([
            'timeout'  => 10.0, // Timeout de 10 secondes
        ]);
    }

    public function sendMessage(
        $recipients,
        $message,
        $sendWA = false,
        $sendSMS = true,
        $scheduleTimestamp = null
    ) {
        try {
            // Vérification des paramètres
            if (empty($recipients) || empty($message)) {
                throw new \Exception("Recipients and message are required.");
            }

            // Préparation des données
            $postData = [
                'apikey' => $this->apiKey,
                'recipients' => $recipients,
                'message' => $message,
                'sendwa' => $sendWA ? 1 : 0,
                'sendsms' => $sendSMS ? 1 : 0
            ];

            if ($scheduleTimestamp !== null) {
                $postData['schedule_timestamp'] = $scheduleTimestamp;
            }

            // Debugging avant l'envoi
            // var_dump($postData);

            // Méthode 1: Envoyer en POST avec form_params
           $response = $this->client->post($this->apiUrl, [
			'headers' => [
				'Content-Type' => 'application/x-www-form-urlencoded'
			],
			'body' => http_build_query([
				'from' => 'composer',
				'apikey' => $this->apiKey,
				'recipients' => $recipients,
				'message' => $message,
				'sendwa' => $sendWA ? 1 : 0,
				'sendsms' => $sendSMS ? 1 : 0,
				'schedule_timestamp' => $scheduleTimestamp ?? null
			])
			]);


            // Alternative: Envoyer en POST avec body encodé (si nécessaire)
            /*
            $response = $this->client->post($this->apiUrl, [
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                'body' => http_build_query($postData)
            ]);
            */

            // Décoder la réponse JSON
            return json_decode($response->getBody()->getContents(), true);

        } catch (RequestException $e) {
            return [
                'success' => false,
                'error' => 'HTTP Request Error: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => 'General Error: ' . $e->getMessage()
            ];
        }
    }
}
