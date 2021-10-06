<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body class="bg-white">
<div class="min-h-screen flex justify-center items-center">
    <form class="bg-gray-200 w-1/3 shadow rounded"  method="post" action="{{route('login')}}">
        @csrf
        <div class="w-full flex justify-center py-3">
            <span class="appearance-none text-2xl font-extralight w-full text-center">Login into account</span>
        </div>
        <div class="w-full px-3 py-2">
            <label class="font-light text-sm uppercase block" for="username">Username</label>
            <input type="text" value="{{ old('username') }}" name="username" id="username" class="appearance-none rounded border shadow p-2 w-full focus:outline-none">
        </div>
        <div class="w-full px-3 py-2">
            <label class="font-light text-sm uppercase block" for="password">password</label>
            <input type="password" value="{{ old('password') }}" name="password" id="password" class="appearance-none rounded border shadow p-2 w-full focus:outline-none">
        </div>
        <div class="w-full flex justify-center py-3">
            <button type="submit" class="appearance-none rounded border p-2 w-1/3 bg-blue-600 text-white shadow-md">Login</button>
        </div>
    </form>
</div>
</body>
</html>

