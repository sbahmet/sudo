<?php

namespace App\Http\Controllers;


use App\Services\DecoService;
use Illuminate\Http\Request;

class DecoratorTestController extends Controller
{
    public function index(Request $request, DecoService $decoService)
    {
        return $decoService->getResult();
    }
}