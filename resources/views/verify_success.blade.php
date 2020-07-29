@extends('layouts.public')
@section('content')
    <section class="uk-container uk-padding" style="min-height: 300px">
      <div class="uk-box-shadow-small uk-padding">
      <p class="x-font-18 uk-text-center uk-margin-medium-top">Selamat <b>{{Auth::user()->nama}}</b>, email anda telah terverifikasi.</p>
      </div>
    </section>
@endsection