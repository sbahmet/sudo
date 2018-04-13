<?php

namespace App\Providers\Html;


class UrlHtmlProvider implements HtmlProvider
{
    protected $text;

    public function __construct(String $url)
    {
        $this->text = file_get_contents($url);
    }

    public function getAsString()
    {
        return $this->text;
    }
}