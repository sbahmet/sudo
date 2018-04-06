<?php

namespace App\Http\Controllers;


use App\Services\StateService;
use Illuminate\Http\Request;

class StateTestController extends Controller
{
    public function index(Request $request, StateService $stateService)
    {
        return $stateService->getResult($request);
    }
}