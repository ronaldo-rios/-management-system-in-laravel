<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gestão Fácil - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>

    <body>
        {{-- Call content of about.blade.php, contact.blade.php and main.blade.php: --}}
        @yield('content')
    </body>
</html>