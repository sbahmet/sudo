<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Example</title>
</head>
<body>
<div id="app">
    <header></header>
    <nav></nav>
    <main>
        <h1>JS framework</h1>
        <form action="" name="create-todo-item">
            title <input type="text" name="title" value="test-title"> <br>
            description <textarea name="description">test desc</textarea><br>
            <button>add</button>
        </form>

        @php /** @var \Illuminate\Database\Eloquent\Collection $todos */ @endphp
        <ul id="todo-list-1" data-todos="{{ $todos->toJson() }}"></ul>


    </main>
    <footer></footer>
</div>
<template id="todo-item">
    <li>
        <input type="checkbox">
        <span>title</span><br>
        <span>description</span>
    </li>
</template>
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>