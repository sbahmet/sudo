<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SudController extends Controller
{
    public function show(Request $request)
    {
        return view('sudo');
    }
}
