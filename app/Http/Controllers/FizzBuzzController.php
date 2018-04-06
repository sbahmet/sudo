<?php

namespace App\Http\Controllers;


use App\Services\FizzBuzzService;
use Illuminate\Http\Request;

class FizzBuzzController extends Controller
{
    public function index(Request $request, FizzBuzzService $fizzBuzzService)
    {
        return $fizzBuzzService->setConfig($request)->getResult();
    }
}