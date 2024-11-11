<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body style="background-color:black">
    <form action="/test" method="POST">
        @csrf
        <input type="text" name="message">
        <input type="submit" style="color:red">
    </form>
</body>

</html>
