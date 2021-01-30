<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livewire File Upload</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        @livewireStyles
    </head>
    <body>
        @livewire('file-upload')

        <script src="/js/jquery-3.3.1.slim.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        @livewireScripts
    </body>
</html>
