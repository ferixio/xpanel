<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/xadmin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/uikit.bundle.js') }}"></script>
    <style>
      @media screen and (max-width: 960px){
        #login-form{
          position: static !important;
        }
      }
    </style>
</head>
<body>
	<section uk-grid>
    <div class="uk-width-1-2@m uk-visible@m  uk-inline uk-background-cover x-fullheight " data-src="{{ asset('/img/bg.png') }}" uk-img style="background: #078285;">
        <img src="{{ asset('/img/logo.png')}}" alt="logo" srcset=""  class="uk-position-center" style="width:200px; height:200px">
    </div>
    
    <div id="login-form" class="uk-width-1-2@m uk-position-relative x-fullheight">
        <form action="" method="POST" class="uk-form-stacked  uk-position-center" >
            @csrf
            <div class="uk-text-center uk-margin-top">
                <img src="{{ asset('/img/logo.png') }}" alt="logo" srcset="" width="170px" height="170px" class=" uk-hidden@m">
            </div>
            <h3 class="uppercase uk-text-center x-color-theme-text uk-margin-remove" style="letter-spacing:6px;"><b>Halaman Login</b></h3>
            <p class="uk-meta uk-text-center x-font-12 uk-margin-remove">Selamat datang kembali! Silahkan Masuk.</p> <br>

            <div class="uk-margin">
                <label for="txt-nama" class="uk-form-label">Email</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input" id="email" name="email" placeholder="masukan email anda"
                        value="{{old('email')}}">
                    <p class="x-font-12 uk-text-danger x-nomargin"> @error('email') {{$message}} @enderror </p>
                </div>
            </div>

            <div class="uk-margin">
                <label for="txt-nama" class="uk-form-label">Kata Sandi</label>
                <div class="uk-form-controls">
                    <input type="password" class="uk-input" id="password" name="password"
                        placeholder="masukan kata sandi anda" value="{{old('password')}}">
                    <p class="x-font-12 uk-text-danger x-nomargin"> @error('password') {{$message}} @enderror </p>
                </div>
            </div>
            <div class="uk-margin-remove" uk-grid>
                <div class="uk-flex uk-flex-middle uk-width-auto">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="x-font-12 uk-margin-small-left"> Ingat saya</label>
                </div>

                <div class="uk-width-expand uk-text-right">
                    <a href="#" class="x-font-12 x-color-theme-text">Lupa password?</a>
                </div>
            </div>
            <br><br>
            <div style="text-align:center">
                <button type="submit" class="uk-button uk-button-danger x-white-text">Masuk</button>
            </div>
        </form>
    </div>

	</section>
</body>
</html>