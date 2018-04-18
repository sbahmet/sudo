<?php

namespace App\Http\Controllers;


use App\Services\Html\HtmlParser;
use Illuminate\Http\Request;

class HtmlParserController extends Controller
{
    public function index(Request $request, HtmlParser $htmlParser)
    {
        return $htmlParser->parse()->getString();
    }
}