@extends('layouts.public')
@section('content')
    <section class="uk-container uk-padding uk-margin-large">
      <div class="uk-box-shadow-small uk-padding uk-align-center" style="max-width: 400px">
        
        <p class="x-font-18 uk-text-bold">Form Reset Password</p>
        <form action="{{url('reset-password')}}" method="POST">
          @csrf
          <div>
            <label for="">Masukan email anda</label>
            <input type="email" class="uk-input" placeholder="masukan email anda disini." name="email">
          </div>
          <button class="uk-button-default uk-button">Reset password</button>
        </form>
        @if (session('success') == true)
            <p class="uk-text-success uk-padding uk-background-muted">Link untuk mereset password telah dikirimkan ke email anda.</p>
        @endif
      </div>
    </section>
@endsection