<?php

namespace App\Services\GSpreadSheetsTranslations;

use Google_Client;
use Google_Service_Sheets;

class GSpreadsheetsTranslationsReader
{
    public function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);

        $clientSecret = \Storage::get('google/client_secret.json');

        $clientSecret = json_decode($clientSecret, JSON_OBJECT_AS_ARRAY);

        $client->setAuthConfig($clientSecret);
        $client->setAccessType('offline');

        // $client->setRedirectUri('MY URI'); // if needed

        // Load previously authorized credentials from a file.

        $credentialsFileExists = \Storage::exists('google/credentials.json');

        if(\Storage::exists('google/credentials.json')) {
            $accessToken = json_decode(\Storage::get('google/credentials.json'), true);
        } else {

            // TODO:

            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

            // Store the credentials to disk.

            \Storage::put('google/credentials.json', json_encode($accessToken));
            printf("Credentials saved to %s\n", 'google/credentials.json');
        }

        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            \Storage::put('google/credentials.json', json_encode($client->getAccessToken()));
        }
        return $client;
    }

    public function getServiceSheets(Google_Client $googleClient)
    {
        return new Google_Service_Sheets($googleClient);
    }

    public function process()
    {
        $client = $this->getClient();
        $service = $this->getServiceSheets($client);

        // https://docs.google.com/spreadsheets/d/1Hgv8WgTqP8UIh-ryOE3YG8UkI0thilQhGdMeEYD_-So/edit?usp=sharing
        $spreadsheetId = '1Hgv8WgTqP8UIh-ryOE3YG8UkI0thilQhGdMeEYD_-So';
        $range = 'List1!A3:H';
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }
}