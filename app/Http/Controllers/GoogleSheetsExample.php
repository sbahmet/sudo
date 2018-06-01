<?php

namespace App\Http\Controllers;


use App\Services\GSpreadSheetsTranslations\GSpreadsheetsTranslationsReader;

class GoogleSheetsExample extends Controller
{
    public function index()
    {
        $gSheetsTransReader = new GSpreadsheetsTranslationsReader();

        $gSheetsTransReader->process();

        return __('main.welcome') .' '. __('auth.email') . __('auth.password');
    }
}