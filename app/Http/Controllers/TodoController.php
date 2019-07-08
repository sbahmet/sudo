<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Contracts\Pipeline\Pipeline;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::query()->latest()->take($request->get('count'))->get();

        if ($request->wantsJson()) {
            return $todos->toJson();
        }

        return view('js-framework.index', compact('todos'));
    }

    public function show(Request $request, $id)
    {

    }

    public function store(Request $request)
    {
        Todo::query()->create($request->all());
    }
}
