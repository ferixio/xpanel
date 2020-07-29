@extends('layouts.public')
@section('content')
    <section class="uk-container uk-padding uk-margin-large">
      <form method="POST" action="{{URL::current()}}" class="uk-padding uk-box-shadow-small uk-align-center" style="max-width: 400px">
        <p class="x-font-18 uk-text-bold">Masukan kata sandi baru anda</p>
        @csrf
        <div>
          <label for="">kata sandi baru anda</label>
          <input type="password" class="uk-input" placeholder="masukan kata sandi baru anda disini" name="password">
          <p id="err-password" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('password'){{$message}}@enderror</p>
        </div>
        <div>
          <label for="">ketik ulang kata sandi baru anda</label>
          <input type="password" class="uk-input" placeholder="ketik ulang kata sandi baru anda disini" name="password_confirmation">
          <p id="err-password" class="x-font-12 x-nomargin uk-text-danger  x-error">@error('password'){{$message}}@enderror</p>
        </div>
        <button class="uk-button uk-button-default uk-margin-medium-top">Reset Password</button>
        @if (session('success') == true)
            <p class="uk-padding uk-background-muted uk-text-success">Kata sandi anda telah diperbarui.</p>
        @endif
      </form>
    </section>
@endsection