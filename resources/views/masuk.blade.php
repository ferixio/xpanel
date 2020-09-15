@extends('layouts.public')
@section('content')
<section class="uk-container uk-padding">
  <div id="login-form" class="uk-margin-medium-top">
    <form action="{{url('login')}}" method="POST" class="uk-form-stacked uk-align-center uk-box-shadow-small uk-padding" style="max-width: 300px" >
        @csrf
       
        <h1 class="uppercase uk-text-center x-color-theme-text uk-margin-remove" style="letter-spacing:3px;"><b>Halaman Login</b></h1>
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
                <a href="{{url('reset-password')}}" class="x-font-12 x-color-theme-text">Lupa password?</a>
            </div>
        </div>
        <br><br>
        <div style="text-align:center">
            <button type="submit" class="uk-button uk-button-danger x-white-text">Masuk</button>
        </div>
    </form>
  </div>
</section>
@endsection