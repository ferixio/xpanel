<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'laxavel') }}</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />

    {{-- <link href="{{ asset('css/xadmin.css') }}" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>

</head>
<body>
  <button uk-toggle="target: #my-id" type="button"> open</button>
 
   <div id="my-id" uk-offcanvas="overlay: true;">
     <div class="uk-offcanvas-bar">
       <div class="">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        ini ofcangas
        <input type="text" class="uk-input">
        <button class="uk-button uk-button-default">simpan</button>
       </div>
     </div>
 </div> 
</body>
</html>