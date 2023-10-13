<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite ('resources/css/app.css')
</head>
<body class="flex flex-col h-screen">
    <header class="bg-gray-800 text-white font-bold" id='header'>
    @include('original_blog.header')
    </header>
    <br>
    <div class="">
    @yield('content')
</div>
    </div>
    <footer class="bg-gray-800 text-white p-4 w-full mt-auto " id='footer'>
        @include('original_blog.footer')
    </footer>
</body>
</html>