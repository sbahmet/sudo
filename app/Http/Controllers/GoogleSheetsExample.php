<?php

namespace App\Http\Controllers;


use App\Services\GSpreadSheetsTranslations\GSpreadsheetsTranslationsReader;

class GoogleSheetsExample extends Controller
{
    public function index()
    {
        //$gSheetsTransReader = new GSpreadsheetsTranslationsReader();

        //$gSheetsTransReader->process();

        dd(array_dot(__('validation')));

        return __('main.welcome.with-dot') .' '. __('auth.email') . __('auth.password');
    }
}