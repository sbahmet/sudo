<?php

namespace App\Services\Html;


use App\Providers\Html\HtmlProvider;
use App\Providers\Html\UrlHtmlProvider;
use App\Services\Html\ParserStates\TextNodeState;

class HtmlParser
{
    protected $htmlProvider;

    /**
     * @var \App\Services\Html\ParserStates\ParsingState $state
     */
    protected $state;

    public function __construct(
        //HtmlProvider $htmlProvider
    )
    {
        //$this->htmlProvider = $htmlProvider;
        $this->htmlProvider = new UrlHtmlProvider('https://ru.wikipedia.org/wiki/%D0%9A%D0%B0%D1%82%D0%B5%D0%B3%D0%BE%D1%80%D0%B8%D1%8F:%D0%A8%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD%D1%8B_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F');
        $this->state = new TextNodeState();
    }

    public function parse()
    {
        // do parse
        foreach (new TextIterator($this->htmlProvider->getAsString()) as $char) {
            $this->parseChar($char);
        }

        return $this;
    }

    public function getString()
    {
        // temp
        return $this->htmlProvider->getAsString();
    }

    protected function parseChar($char)
    {
        var_dump($char);
    }
}

/*
 * Self-closing
    <area />
    <base />
    <br />
    <col />
    <command />
    <embed />
    <hr />
    <img />
    <input />
    <keygen />
    <link />
    <menuitem />
    <meta />
    <param />
    <source />
    <track />
    <wbr />

    -------

    can be both: self-closing and normal

    <script> ???
    <style> ???

    -------

    <!-- comment -->
    <!doctype html>
 */