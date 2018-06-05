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

        if(\Storage::exists('google/credentials.json')) {
            $accessToken = json_decode(\Storage::get('google/credentials.json'), true);
        } else {

            // TODO: console input via artisan tool

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

        $range = 'main!A3:Z';

        $response = $service->spreadsheets_values->get($spreadsheetId, $range);

        $values = $response->getValues();

        $translations = $this->processSheetData($values);

        $translationsByFiles =  $this->slugsByFiles($translations);

        $this->saveToLangFiles($translationsByFiles);
    }

    protected function processSheetData($values)
    {
        /*
        array:6 [▼
          0 => array:8 [▼
            0 => "slug"
            1 => "description"
            2 => "en"
            3 => "de"
            4 => "fr"
            5 => "cn"
            6 => "jp"
            7 => "kr"
          ]
          1 => array:8 [▼
            0 => "main.welcome"
            1 => "at the top of the home page"
            2 => "Welcome!"
            3 => "Welkommen"
            4 => "fr-welcome"
            5 => "cn-welcome"
            6 => "jp-welcome"
            7 => "kr-welcome"
          ]
          2 => array:4 [▼
            0 => "main.login-to-proceed"
            1 => ""
            2 => "Log in to proceed"
            3 => "de-login to proceed"
          ]
          3 => array:3 [▶]
          4 => array:3 [▶]
          5 => array:3 [▶]
        ]

         */

        $translations = [];
        $locales = array_shift($values); // ['slug', 'desc','en','de','fr','cn',...]

        array_splice($locales, 0, 2);

        foreach ($locales as $locale) {
            $translations[$locale] = [];
        }

        foreach ($values as $row) {
            $slug = $row[0];
            array_splice($row, 0, 2);
            foreach ($row as $i => $translation) {
                if ($translation) {
                    $translations[$locales[$i]][$slug] = $translation;
                }
            }
        }

        return $translations;
    }

    protected function slugsByFiles($translations)
    {
        $translationsLocaleFiles = [];

        foreach ($translations as $locale => $dictionary) {
            $files = [];
            foreach ($dictionary as $key => $translation) {
                $fileSlug = explode('.', $key, 2);
                $filename = $fileSlug[0];
                $slug = $fileSlug[1];
                if (!isset($files[$filename])) {
                    $files[$filename] = [$slug => $translation];
                } else {
                    $files[$filename][$slug] = $translation;
                }
            }

            $translationsLocaleFiles[$locale] = $files;
        }

        return $translationsLocaleFiles;

    }

    protected function saveToLangFiles($translationsByFiles)
    {

        /*
        array:6 [▼
          "us" => array:3 [▼
            "main" => array:2 [▼
              "welcome" => "Welcome!"
              "login-to-proceed" => "Log in to proceed"
            ]
            "auth" => array:2 [▶]
            "common" => array:1 [▶]
          ]
          "de" => array:1 [▶]
          "fr" => array:1 [▶]
          "cn" => array:2 [▶]
          "jp" => array:1 [▶]
          "kr" => array:2 [▶]
        ]
         */


        $langPath = resource_path('lang');

        $fileHeader = '<?php'.PHP_EOL.PHP_EOL .'return ';

        foreach ($translationsByFiles as $locale => $fileList) {
            if (is_dir($langPath.'/'. $locale)) {
                self::delTree($langPath.'/'. $locale);
            }
            mkdir($langPath.'/'. $locale);
            foreach($fileList as $filename => $dictionary) {
                file_put_contents(
                    $langPath.'/'. $locale.'/'.$filename.'.php',
                    $fileHeader . var_export($dictionary, true).';'
                );
            }
        }
    }

    public static function delTree($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}